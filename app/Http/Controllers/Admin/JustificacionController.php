<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdJustificacion;
use App\Models\BsdMotivo;
use App\Models\BsdAlumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JustificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.justificacion.indexf');
    }
    public function index()
    {
        $bsd_justificacion = BsdJustificacion::all();
        $relacion = BsdMotivo::pluck('nombre', 'nombre');
        return view('admin.justificacion.index', compact('bsd_justificacion','relacion'));
    }

    public function create()
    {
        // Obtener los códigos de los alumnos
        $alumnoCodigos = BsdAlumno::pluck('codigo')->toArray();
        $relacion = BsdMotivo::pluck('nombre', 'nombre');
        return view('admin.justificacion.create', compact('alumnoCodigos','relacion'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'dni' => 'required',
            'codigo' => 'required',
            'fecha_reg' => 'required',
            'justificacion'=> 'required',
            'observacion'=> 'required',

        ]);

        $justificacion = BsdJustificacion::create($request->all());

        return redirect()->route('admin.justificacion.show', compact('justificacion'))->with('crear-justificacion', 'store');
    }

    public function show(BsdJustificacion $justificacion)
    {
        return view('admin.justificacion.show', compact('justificacion'));
    }

	public function search(Request $request)
    {
        $search = $request->get('term');
        if (empty($search) || strlen($search) < 2) {
            return [];
        }

        $alumno = BsdAlumno::where('ind_vigencia', 'S')
            ->where('codigo', $search)
            ->select('codigo', 'dni', 'ape_pat', 'ape_mat', 'nombres')
            ->first(); // Obtener solo un resultado

        return $alumno ? [$alumno] : [];
    }
}
