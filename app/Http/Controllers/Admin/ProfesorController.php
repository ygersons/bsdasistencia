<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\BsdProfesor;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProfesorController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.profesores.index');
    }

    public function index()
    {
        return view('admin.profesores.index');
    }


    public function create()
    {

        return view('admin.alumnos.create');
    }

    public function store(Request $request)
    {
        
        $request-> validate([
            'dni' => 'required|unique:bsd_alumno',
        ]);

        $numero = $request['dni'];
        
        $request['codigo']=$numero;

        $alumno = BsdProfesor::create($request->all());

        return redirect()->route('admin.alumnos.show',compact('alumno'))->with('crear-alumno','store');
    }

    public function show(BsdProfesor $alumno)
    {
        
        return view('admin.alumnos.show', compact('alumno'));
    }

    public function edit(BsdProfesor $alumno)
    {
        
        return view('admin.alumnos.edit', compact('alumno'))->with('info', 'Se edito los datos del alumno');
    }

    public function update(Request $request,BsdProfesor $alumno )
    {
        
        $request-> validate([
            'dni' => "required|unique:bsd_alumno,dni,$alumno->id",
        ]);

        $alumno->update($request->all());

        return redirect()->route('admin.alumnos.show',compact('alumno'));
    }

    public function destroy(BsdProfesor $alumno )
    {

        $alumno->delete();

        return redirect()->route('admin.alumnos.index')->with('borrar-alumno', 'ok');
    }

    public function importView(Request $request){
        return view('importFile');
    }

    public function import(Request $request){
        
    }
}
