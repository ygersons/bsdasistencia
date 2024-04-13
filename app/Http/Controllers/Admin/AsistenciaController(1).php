<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BsdAsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.asistencia.index');
    }
    public function index()
    {
    	$bsd_asistencia = BsdAsistencia::where('fechaA', '=', DB::raw('curdate()'));
        return view('admin.asistencia.index',compact('bsd_asistencia'));
    }

    public function marcar(Request $request)
    {
        try {
            $dni = $request->estudiante;
            $query = DB::table('bsd_alumno')->where('dni', '=', $dni)->pluck('nombres');
            // Validar si el estudiante existe
            $names = strval($query['0']);
            // Obtener la fecha y hora actual en la zona horaria de Perú
            $fecha = Carbon::now('America/Lima')->toDateString();
            $horaEntrada = Carbon::now('America/Lima')->toTimeString();
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
            $reg->salidaA = '00:00:00';
            $reg->status = 'A';
            $reg->save();

            return redirect('admin/asistencia')->with('registrar', 'ok');
        } catch (\Throwable $th) {
            // En caso de error, redireccionar con un mensaje de error específico
            return redirect('admin/asistencia')->with('error', 'vacio');
        }
    }

    public function store(Request $request)
    {
        $numero = $request['dni'];
        
        $alumno = BsdAsistencia::create($request->all());

        return redirect('/control',compact('alumno'));

    }

    public function controlList()
    {
        $bsd_asistencia = BsdAsistencia::all();
        return view('admin.asistencia.control', compact('bsd_asistencia'));
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
