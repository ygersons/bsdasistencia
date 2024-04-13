<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdMotivo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bsd_motivo = BsdMotivo::all();
        return view('admin.motivo.index', compact('bsd_motivo'));
    }
    public function create()
    {

        return view('admin.motivo.create');
    }
    public function edit(BsdMotivo $motivo)
    {
        return view('admin.motivo.edit', compact('motivo'))->with('edit-motivo', 'ok');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $usuarioAutenticado = Auth::user();

        $data = $request->all();
        $data['usuario_reg'] = $usuarioAutenticado->name; // O usa $usuarioAutenticado->nombre según tu caso

        $motivo = BsdMotivo::create($data);

        return redirect()->route('admin.motivo.show', compact('motivo'))->with('crear-motivo', 'store');
    }


    /**
     * Display the specified resource.
     */
    public function show(BsdMotivo $motivo)
    {
        return view('admin.motivo.show', compact('motivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BsdMotivo $motivo)
    {
        $motivo->update($request->all());

        $user = Auth::user();

        // Asegúrate de que el campo 'usuario_reg' esté presente en $fillable del modelo BsdMotivo
        $motivo->update(['usuario_act' => $user->name]);

        return redirect()->route('admin.motivo.show', compact('motivo'))->with('update-motivo', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BsdMotivo $motivo)
    {
        $motivo->delete();
        return redirect()->route('admin.motivo.indextrash')->with('delete-motivo', 'ok');
    }

    public function indextrash()
    {
        $bsd_motivo = BsdMotivo::where('ind_vigencia', 'N')->get();
        return view('admin.motivo.indextrash', compact('bsd_motivo'));
    }

    public function destroyLogico(BsdMotivo $motivo)
    {
        $motivo->ind_vigencia = 'N';
        $motivo->save();
        return redirect()->route('admin.motivo.index')->with('removido', 'motivo_removido');
    }

    public function restaurarmotivo(BsdMotivo $motivo)
    {
        $motivo->ind_vigencia = 'S';
        $motivo->save();
        return redirect()->route('admin.motivo.indextrash')->with('success', 'restaurar');
    }
}
