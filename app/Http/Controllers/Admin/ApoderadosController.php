<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BsdApoderado;
use Illuminate\Http\Request;
use App\Imports\ApoderadosImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ApoderadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.apoderados.indexf');
    }
    public function index()
    {
        $bsd_apoderado = BsdApoderado::all();
        return view('admin.apoderados.index', compact('bsd_apoderado'));
    }

	public function index_cargas()
    {
        $bsd_apoderado = BsdApoderado::all();

        return view('admin.apoderados.index-cargas',compact('bsd_apoderado'));
    }

    public function create()
    {

        return view('admin.apoderados.create');
    }
    public function edit(BsdApoderado $apoderado)
    {
        return view('admin.apoderados.edit', compact('apoderado'))->with('edit-apoderado', 'ok');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
    	$messages = [
            'doc_identidad.required' => 'Documento de Identidad es obligatorio.',
            'nro_doc_iden.required' => 'Número de Documento es obligatorio.',
            'ape_pat.required' => 'Apellido Paterno es obligatorio.',
            'ape_mat.required' => 'Apellido Materno es obligatorio.',
            'nombres.required' => 'Nombres es obligatorio.',
            'celular.required' => 'Celular es obligatorio.',
            'email.required' => 'Correo Electrónico es obligatorio.',
            'sexo.required' => 'Sexo es obligatorio.',
            'dni_alumno.required' => 'DNI del Alumno es obligatorio.',
            'parentesco.required' => 'Parentesco es obligatorio.',
        ];

        $request->validate([
            'doc_identidad'=>'required',
            'nro_doc_iden'=>'required|digits:8',
            'ape_pat'=>'required',
            'ape_mat'=>'required',
            'nombres'=>'required',
            'celular'=>'required',
            'email'=>'required',
            'sexo'=>'required',
            'dni_alumno'=>'required',
            'parentesco'=>'required',
        ], $messages);
    
        $apoderado = BsdApoderado::create($request->all());
    	$name_com = $request->ape_pat.' '.$request->ape_mat.' '.$request->nombres;
        DB::update('update bsd_apoderado set nom_completo = ? where nro_doc_iden = ?',[$name_com, $request->nro_doc_iden]);
        return redirect()->route('admin.apoderados.show', compact('apoderado'))->with('store-apoderado', 'ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(BsdApoderado $apoderado)
    {
        return view('admin.apoderados.show', compact('apoderado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BsdApoderado $apoderado)
    {
        $apoderado->update($request->all());
        return redirect()->route('admin.apoderados.show', compact('apoderado'))->with('update-apoderado', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BsdApoderado $apoderado)
    {
        $apoderado->delete();
        return redirect()->route('admin.apoderados.index')->with('delete-apoderado', 'ok');
    }

	public function indextrash()
    {
        $bsd_apoderado = BsdApoderado::where('ind_vigencia', 'N')->get();
        return view('admin.apoderados.indextrash', compact('bsd_apoderado'));
    }

    public function destroyLogico(BsdApoderado $apoderado)
    {
        $apoderado->ind_vigencia = 'N';
        $apoderado->save();
        return redirect()->route('admin.apoderados.index')->with('removido', 'apoderado_removido');
    }

    public function restaurarapoderados(BsdApoderado $apoderado)
    {
        $apoderado->ind_vigencia = 'S';
        $apoderado->save();
        return redirect()->route('admin.apoderados.indextrash')->with('success', 'restaurar');
    }

	public function import(Request $request)
    {
        if ($request->file('file')) {
            Excel::import(new ApoderadosImport(), $request->file('file')->store('files'));
            return redirect()->route('admin.apoderados.index_cargas_apoderado')->with('actualizado', 'apoderado_actualizado'); //aqui se pone el nombre de la ruta que le pusimos en routes
        } else {
            return redirect()->route('admin.apoderados.index_cargas_apoderado')->with('vacio', 'apoderado_vacio');
        }
    }
}
