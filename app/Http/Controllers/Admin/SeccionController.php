<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdGrado;
use App\Models\BsdSeccion;

use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bsd_seccion = BsdSeccion::all();
        $relacion = BsdGrado::pluck('nombre', 'id');
        return view('admin.seccion.index', compact('bsd_seccion','relacion'));
    }

    public function create()
    {
        $relacion = BsdGrado::pluck('nombre', 'id');
        return view('admin.seccion.create', compact('relacion'));
    }

    public function edit(BsdSeccion $seccion)
    {
        $relacion = BsdGrado::pluck('nombre', 'id');
        return view('admin.seccion.edit', compact('seccion','relacion'))->with('edit-seccion', 'ok');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
        ]);
        $seccion = BsdSeccion::create($request->all());
        return redirect()->route('admin.seccion.show', compact('seccion'))->with('store-seccion', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(BsdSeccion $seccion)
    {
        return view('admin.seccion.show', compact('seccion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BsdSeccion $seccion)
    {
        $seccion->update($request->all());
        return redirect()->route('admin.seccion.show', compact('seccion'))->with('update-seccion', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BsdSeccion $seccion)
    {
        $seccion->delete();
        return redirect()->route('admin.seccion.indextrash')->with('delete-seccion', 'ok');
    }

    public function indextrash()
    {
        $relacion = BsdGrado::pluck('nombre', 'id');
        $bsd_seccion = BsdSeccion::where('ind_vigencia', 'N')->get();
        return view('admin.seccion.indextrash', compact('bsd_seccion','relacion'));
    }

    public function destroyLogico(BsdSeccion $seccion)
    {
        $seccion->ind_vigencia = 'N';
        $seccion->save();
        return redirect()->route('admin.seccion.index')->with('removido', 'seccion_removido');
    }

    public function restaurarseccion(BsdSeccion $seccion)
    {
        $seccion->ind_vigencia = 'S';
        $seccion->save();
        return redirect()->route('admin.seccion.indextrash')->with('success', 'restaurar');
    }
}
