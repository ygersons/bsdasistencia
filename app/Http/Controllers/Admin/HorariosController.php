<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdHorario;
use Illuminate\Http\Request; 

class horariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.horarios.index');
    }
    public function index()
    {
        $bsd_horario = BsdHorario::all();
        return view('admin.horarios.index', compact('bsd_horario'));
    }
    public function create()
    {

        return view('admin.horarios.create');
    }
    public function edit(BsdHorario $horario)
    {
        return view('admin.horarios.edit', compact('horario'))->with('edit-horario', 'ok');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    	$messages = [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
            'fecha_ini.required' => 'La fecha de inicio es obligatoria.',
            'fecha_ini.date' => 'La fecha de inicio debe ser una fecha válida.',
            'fecha_fin.required' => 'La fecha de terminación es obligatoria.',
            'fecha_fin.date' => 'La fecha de terminación debe ser una fecha válida.',
            'hora_ini.required' => 'La hora de inicio es obligatoria.',
            'hora_ini.date_format' => 'La hora de inicio debe tener el formato HH:MM:SS.',
            'hora_fin.required' => 'La hora de final es obligatoria.',
            'hora_fin.date_format' => 'La hora de fin debe tener el formato HH:MM:SS.',
        ];

        $request->validate([
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date',
            'hora_ini' => 'required',
            'hora_fin' => 'required',
        ], $messages);
        $horario = BsdHorario::create($request->all());
        return redirect()->route('admin.horarios.show', compact('horario'))->with('store-horario', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(BsdHorario $horario)
    {
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BsdHorario $horario)
    {
        $horario->update($request->all());
        return redirect()->route('admin.horarios.show', compact('horario'))->with('update-horario', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BsdHorario $horario)
    {
        $horario->delete();
        return redirect()->route('admin.horarios.index')->with('delete-horario', 'ok');
    }
}
