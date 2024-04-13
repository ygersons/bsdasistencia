<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdGrado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bsd_grado = BsdGrado::all();
        return view('admin.grado.index', compact('bsd_grado'));
    }
    public function create()
    {

        return view('admin.grado.create');
    }
    public function edit(BsdGrado $grado)
    {
        return view('admin.grado.edit', compact('grado'))->with('edit-grado', 'ok');
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

        $usuarioAutenticado = Auth::user();

        $data = $request->all();
        $data['usuario_reg'] = $usuarioAutenticado->name; // O usa $usuarioAutenticado->nombre según tu caso

        $grado = BsdGrado::create($data);

        return redirect()->route('admin.grado.show', compact('grado'))->with('crear-grado', 'store');
    }


    /**
     * Display the specified resource.
     */
    public function show(BsdGrado $grado)
    {
        return view('admin.grado.show', compact('grado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BsdGrado $grado)
    {
        $grado->update($request->all());

        $user = Auth::user();

        // Asegúrate de que el campo 'usuario_reg' esté presente en $fillable del modelo BsdGrado
        $grado->update(['usuario_act' => $user->name]);

        return redirect()->route('admin.grado.show', compact('grado'))->with('update-grado', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BsdGrado $grado)
    {
        $grado->delete();
        return redirect()->route('admin.grado.indextrash')->with('delete-grado', 'ok');
    }

    public function indextrash()
    {
        $bsd_grado = BsdGrado::where('ind_vigencia', 'N')->get();
        return view('admin.grado.indextrash', compact('bsd_grado'));
    }

    public function destroyLogico(BsdGrado $grado)
    {
        $grado->ind_vigencia = 'N';
        $grado->save();
        return redirect()->route('admin.grado.index')->with('removido', 'grado_removido');
    }

    public function restaurargrado(BsdGrado $grado)
    {
        $grado->ind_vigencia = 'S';
        $grado->save();
        return redirect()->route('admin.grado.indextrash')->with('success', 'restaurar');
    }
}
