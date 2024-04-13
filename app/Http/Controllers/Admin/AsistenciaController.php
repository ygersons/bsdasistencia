<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdAlumno;
use App\Models\BsdApoderado;
use App\Models\BsdAsistencia;
use App\Models\BsdHorario;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.asistencia.index');
    }
    public function index()
    {
        $bsd_asistencia = BsdAsistencia::where('fechaA', '=', DB::raw('curdate()'));
        //dd($bsd_asistencia);
        return view('admin.asistencia.index', compact('bsd_asistencia'));
    }

    public function marcar(Request $request)
    {	
        try {
            date_default_timezone_set('America/Lima');
            $dni = $request->estudiante;
            $alumConsulta = BsdAlumno::where('dni', '=', $request->estudiante)->get();
            $alumData = $alumConsulta[0];
            // Validar si el estudiante existe
            $names = $alumData->ape_pat.' '.$alumData->ape_mat.' '.$alumData->nombres;
            // Obtener la fecha y hora actual en la zona horaria de Perú
            $fecha = date('Y-m-d');
            $horaEntrada = date('H:i:s');
            // Verificar si ya existe un registro para este estudiante en la misma fecha
            $existingRegistro = BsdAsistencia::where('dniA', $dni)
                ->where('fechaA', $fecha)
                ->first();
            // Si ya existe un registro, mostrar un mensaje de duplicado
            if ($existingRegistro) {
                return redirect('admin/asistencia')->with('error', 'duplicado');
            }
        	//Obtener el nombre del usuario que registra
            $usuarioReg = Auth::user();
            // Si no existe un registro, proceder con el registro
            $reg = new BsdAsistencia;
            $reg->dniA = $dni;
            $reg->nombreA = $names;
            $reg->fechaA = $fecha;
            $reg->entradaA = $horaEntrada;
            $reg->salidaA = null;
            $reg->status = $this->determinarEstado($horaEntrada);
        	$reg->usuario_reg = $usuarioReg->name;
            $reg->save();
        	//Notificaciones de Whatsapp
        	$Wsp = new WhatsappController;
        	$enviarW = $Wsp->asistenciaWsp($request);
			/*$condicion = $this->determinarEstado($horaEntrada);
            switch ($condicion) {
                case $condicion = 'T':
                    $genPdf = new AsistenciaController;
                    //$generar_pdf = $genPdf->boleta($request);
                    $WspDoc = new WhatsappController;
                    //$enviarW = $WspDoc->envioPdf($request);
                    break;
                default:
                    $Wsp = new WhatsappController;
        		    //$enviarW = $Wsp->asistenciaWsp($request);//comentar esta linea para no enviar el mensaje de Whatsaap
                break;
            }*/
            return redirect('admin/asistencia')->with('registrar', 'ok');
        } catch (\Throwable $th) {
            // En caso de error, redireccionar con un mensaje de error específico
            return redirect('admin/asistencia')->with('error', 'vacio');
        }
    }
	public function asistenciaFaltasM(){
        date_default_timezone_set('America/Lima');
        	$horaEntrada = date('H:i:s');
        if ($horaEntrada < '12:00:00') {
            $faltantes = DB::select('CALL faltas_turno_mañana');
        }else{
            $faltantes = DB::select('CALL faltas_turno_tarde');
        }
        for ($i=0; $i < count($faltantes); $i++) {
            try {
            $AlumnoF = $faltantes[$i];
            $dni= $AlumnoF->dni;
            //buscando datos de alumnos
            $alumConsulta = BsdAlumno::where('dni', '=', $dni)->get();
            $alumData = $alumConsulta[0];
            // Validar si el estudiante existe
            $names = $alumData->ape_pat.' '.$alumData->ape_mat.' '.$alumData->nombres;
            // Obtener la fecha y hora actual en la zona horaria de Perú
            $fecha = date('Y-m-d');  
            // Verificar si ya existe un registro para este estudiante en la misma fecha
            $existingRegistro = BsdAsistencia::where('dniA', $dni)
                ->where('fechaA', $fecha)
                ->first();
            // Si ya existe un registro, mostrar un mensaje de duplicado
            if ($existingRegistro) {
                return redirect('admin/asistencia')->with('error', 'duplicado');
            }
            // Si no existe un registro, proceder con el registro
            $reg = new BsdAsistencia;
            $reg->dniA = $dni;
            $reg->nombreA = $names;
            $reg->fechaA = $fecha;
            $reg->entradaA = $horaEntrada;
            $reg->salidaA = null;
            $reg->status = $this->determinarEstado($horaEntrada);
            $reg->save();
        	//Notificaciones de Whatsapp
        	$Wsp = new WhatsappController;
        	$enviarW = $Wsp->asistenciaWsp($request);            
        } catch (\Throwable $th) {
            // En caso de error, redireccionar con un mensaje de error específico
            return redirect('admin/asistencia')->with('error', 'vacio');
        }
        }
        return redirect('admin/asistencia')->with('registrar', 'ok');
    }

    private function determinarEstado($horaEntrada)
    {
        $hora = $horaEntrada;
        if ($hora < '11:30:00') {
            $entrada = BsdHorario::where('nombre', '=', 'M')->where('orden', '=', '1')
            ->where('ind_vigencia', '=', 'S')->get();
            $tardanza = BsdHorario::where('nombre', '=', 'M')->where('orden', '=', '2')
            ->where('ind_vigencia', '=', 'S')->get();
            $falta = BsdHorario::where('nombre', '=', 'M')->where('orden', '=', '3')
            ->where('ind_vigencia', '=', 'S')->get();
            
        }elseif($hora > '20:30:00'){
            $entrada = BsdHorario::where('nombre', '=', 'N')->where('orden', '=', '1')
            ->where('ind_vigencia', '=', 'S')->get();
            $tardanza = BsdHorario::where('nombre', '=', 'N')->where('orden', '=', '2')
            ->where('ind_vigencia', '=', 'S')->get();
            $falta = BsdHorario::where('nombre', '=', 'N')->where('orden', '=', '3')
            ->where('ind_vigencia', '=', 'S')->get();
        }else{
            $entrada = BsdHorario::where('nombre', '=', 'T')->where('orden', '=', '1')
            ->where('ind_vigencia', '=', 'S')->get();
            $tardanza = BsdHorario::where('nombre', '=', 'T')->where('orden', '=', '2')
            ->where('ind_vigencia', '=', 'S')->get();
            $falta = BsdHorario::where('nombre', '=', 'T')->where('orden', '=', '3')
            ->where('ind_vigencia', '=', 'S')->get();
        }
        $horarioE = $entrada[0];
        $horarioT = $tardanza[0];
        $horarioF = $falta[0];

        $opcion = $hora;

        switch ($opcion) {
            case /*$opcion > $horarioE->hora_ini and*/ $opcion < $horarioE->hora_fin:
                return "A";
                break;
            case $opcion > $horarioT->hora_ini and $opcion < $horarioT->hora_fin:     
                return "T";
                break;
            case $opcion > $horarioF->hora_ini /*and $opcion < $horarioF->hora_fin*/:
                return "F";
                break;
        }
    }

    public function store(Request $request)
    {
        $numero = $request['dni'];

        $alumno = BsdAsistencia::create($request->all());

        return redirect('/control', compact('alumno'));
    }

    public function controlList()
    {
        $bsd_asistencia = BsdAsistencia::all();
        return view('admin.asistencia.control', compact('bsd_asistencia'));
    }
	public function boleta(Request $request){
        $dni = $request->estudiante;
        //asignar datos para el generado de pdf
        $ruta = './boleta_disciplina/';
        $fecha = Carbon::now('America/Lima')->toDateString();
        //Consulta para obteber datos del Alumno
        $alumConsult = BsdAlumno::where('dni', '=', $dni)->get();
        $alumno = $alumConsult[0];
        $apodConsult = BsdApoderado::where('dni_alumno', '=', $dni)->get();
        $apoderado = $apodConsult[0];
        $nombrePdf = 'Boleta_'.$alumno->codigo.'_'.$fecha.'.pdf';
        //Generr el pdf con datos del alumno seleccionado y guardarlo en la ruta especificada
        $dompdf = Pdf::setPaper([0,0,209.76,297.63])->loadView('admin.asistencia.boleta', compact('alumno','apoderado'));
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents( $ruta.$nombrePdf, $output);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
