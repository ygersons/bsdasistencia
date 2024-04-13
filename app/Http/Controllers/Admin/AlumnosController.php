<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AlumnosExport;
use App\Http\Controllers\Controller;
use App\Imports\AlumnosImport;
use App\Models\BsdAlumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS1D;
use Barryvdh\DomPDF\Facade\Pdf;

class AlumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.alumnos.index');
    }

    public function index()
    {
		$tb_dni = DB::table('bsd_alumno')->pluck('dni');
        for ($i=0; $i < count($tb_dni); $i++) { 
            $b_code = new DNS1D();
            $b_code->setStorPath('./img/cod_bar/');
            $b_code->getBarcodePNGPath($tb_dni[$i], 'C128');
        }
        return view('admin.alumnos.index');
    }

	public function index_cargas()
    {
        $bsd_alumno = BsdAlumno::all();
        
        return view('admin.alumnos.index-cargas',compact('bsd_alumno'));
    }

    public function create()
    {

        return view('admin.alumnos.create');
    }

    public function store(Request $request)
    {

        $messages = [
            'dni.required' => 'DNI es obligatorio.',
            'dni.unique' => 'El DNI ya está registrado.',
            'codigo.required' => 'Código de Alumno es obligatorio.',
            'codigo.unique' => 'El Código de Alumno ya está registrado.',
            'nombres.required' => 'Nombres es obligatorio.',
            'ape_pat.required' => 'Apellido Paterno es obligatorio.',
            'ape_mat.required' => 'Apellido Materno es obligatorio.',
            'sexo.required' => 'Sexo es obligatorio.',
            'email.required' => 'Email es obligatorio.',
            'email.email' => 'El Email debe ser una dirección de correo electrónico válida.',
            'anio.required' => 'Año es obligatorio.',
            'anio.numeric' => 'El Año debe ser un valor numérico.',
        ];

        $request->validate([
            'dni' => 'required|unique:bsd_alumno',
            'codigo' => 'required|unique:bsd_alumno',
            'nombres' => 'required',
            'ape_pat' => 'required',
            'ape_mat' => 'required',
            'sexo' => 'required',
            'email' => 'required|email',
            'anio' => 'required|numeric',
        ], $messages);
    
    	if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $dni = $request->dni;
            $destino = '/img/fotos_alumnos/';
            $file->move($destino, $file->getClientOriginalName());
            $alumno = BsdAlumno::create($request->all());
            DB::update('update bsd_alumno set image = ? where dni = ?', [$name, $dni]);
            $name_com = $request->ape_pat.' '.$request->ape_mat.' '.$request->nombres;
            DB::update('update bsd_alumno set nom_completo = ? where dni = ?', [$name_com, $dni]);
            DB::commit();
        } else {
            $alumno = BsdAlumno::create($request->all());
            $name_com = $request->ape_pat.' '.$request->ape_mat.' '.$request->nombres;
        	DB::update('update bsd_alumno set nom_completo = ? where dni = ?', [$name_com, $request->dni]);
        }

        return redirect()->route('admin.alumnos.show', compact('alumno'))->with('crear-alumno', 'store');
    }

    public function show(BsdAlumno $alumno)
    {

        return view('admin.alumnos.show', compact('alumno'));
    }

    public function edit(BsdAlumno $alumno)
    {

        return view('admin.alumnos.edit', compact('alumno'))->with('info', 'Se edito los datos del alumno');
    }

    public function update(Request $request, BsdAlumno $alumno)
    {

        /*$request->validate([
            'dni' => 'required|unique:bsd_alumno',
            'codigo' => 'required|unique:bsd_alumno',
            'nombres' => 'required',
            'ape_pat' => 'required',
            'ape_mat' => 'required',
            'sexo' => 'required',
            'email' => 'required',
            'anio' => 'required',
        ]);*/
        try {
            if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $dni = $request->dni;
            $destino = './img/fotos_alumnos/';
            $file->move($destino,$name);
            $alumno->update($request->all());
            DB::update('update bsd_alumno set image = ? where dni = ?', [$name, $dni]);
            DB::commit();
        } else {
            $alumno->update($request->all());
        }
        } catch (\Throwable $th) {
            return redirect('admin/alumnos')->with('error','img');
        }
        return redirect()->route('admin.alumnos.show', compact('alumno'))->with('info', 'update');
    }

    public function importView(Request $request)
    {
        return view('importFile');
    }

    public function import(Request $request)
    {
        if ($request->file('file')) {
            Excel::import(new AlumnosImport(), $request->file('file')->store('files'));
            return redirect()->route('admin.alumnos.index_cargas')->with('actualizado', 'alumno_actualizado'); //aqui se pone el nombre de la ruta que le pusimos en routes 
        } else {
            return redirect()->route('admin.alumnos.index_cargas')->with('vacio', 'alumno_vacio');
        }
    }

    public function export(Request $request)
    {
        $filtro = $request->get('filtro');

        $alumnosExport = new AlumnosExport($filtro);

        return Excel::download($alumnosExport, 'Reporte_de_alumnos.xlsx');
    }

	public function generatePDF(BsdAlumno $alumno)
    {
        $pdf = PDF::loadView('admin.alumnos.reportes.pdf_individual', compact('alumno'));
        return $pdf->download('Alumno.pdf');
    }

    public function generatePDF_allAlumnos(Request $request)
    {
        $filtro = $request->get('filtro');

        // Realiza la consulta en función del filtro
        $bsd_alumno = BsdAlumno::where('codigo', 'LIKE', '%'.$filtro  . '%')->get();

        // Carga la vista del PDF con los datos obtenidos
        $pdf = PDF::loadView('admin.alumnos.reportes.allAlumnos', compact('bsd_alumno'));

        // Descarga el PDF
        return $pdf->download('Alumnos.pdf');
    }

	public function carnet(BsdAlumno $alumno){
        
        $pdf = Pdf::setPaper([0,0,241.2,153.3])->loadView('admin.alumnos.carne', compact('alumno')); //->setPaper('a4', 'landscape'); aplicar si se quiere hoja horizontal
        return $pdf->download('Carnet_alumno_'.$alumno->dni.'.pdf'); 
    }
	
	public function generatePDF_carnet_todos(Request $request)
    {
        $filtro = $request->get('filtro');

        // Realiza la consulta en función del filtro
        $bsd_alumno = BsdAlumno::where('codigo', 'LIKE', $filtro  . '%')->get();

        // Carga la vista del PDF con los datos obtenidos
        $pdf = PDF::loadView('admin.alumnos.reportes.todos_carnet_alumno', compact('bsd_alumno'));

        // Descarga el PDF
        return $pdf->download('Alumnos.pdf');
    }

	public function carneGrados(Request $request)
    {
        $grado = $request->get('grado');
        $filtroaula = $request->get('filtroaula');

        // Realiza la consulta en función de ambos filtros
        $bsd_alumno = BsdAlumno::where('codigo', 'LIKE', $grado . $filtroaula . '%')->get();

        // Carga la vista del PDF con los datos obtenidos
        $pdf = PDF::setPaper([0,0,241.2,153.3])->loadView('admin.alumnos.carne-grado', compact('bsd_alumno'));

        // Descarga el PDF
        return $pdf->download('CarneGrados.pdf');
    }

	public function destroy(BsdAlumno $alumno)
    {

        $alumno->delete();

        return redirect()->route('admin.alumnos.indextrash')->with('borrar-alumno', 'ok');
    }

    public function indextrash()
    {
        $bsd_alumno = BsdAlumno::where('ind_vigencia', 'N')->get();
        return view('admin.alumnos.indextrash', compact('bsd_alumno'));
    }

    public function destroyLogico(BsdAlumno $alumno)
    {
        $alumno->ind_vigencia = 'N';
        $alumno->save();
        return redirect()->route('admin.alumnos.index')->with('removido','alumno_removido');
    }

    public function restaurarAlumnos(BsdAlumno $alumno)
    {
        $alumno->ind_vigencia = 'S';
        $alumno->save();
        return redirect()->route('admin.alumnos.indextrash')->with('success','restaurar');
    }
}
