<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Reporte_asistencia_Export;
use App\Exports\Reporte_justificacion_Export;
use App\Http\Controllers\Controller;
use App\Models\BsdAsistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS1D;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
    {
        $this->middleware('can:admin.reportes.indexf_asistencia');
    }

    public function index_asistencias(Request $request)
    {
        $fecha_inicio = $request->fecha_inicio; // obtener fecha de alguna manera;
        $fecha_fin = $request->fecha_fin; // obtener fecha de alguna manera;
        $estado = $request->status;
        $codigo = $request->codigo;
        $nombres =  $request->nombres;
        // Consulta a la base de datos u otras operaciones necesarias
        $asistencia_rpt = DB::select('CALL sp_asistencia_rpt(?,?,?,?,?)',
        [$fecha_inicio, $fecha_fin, $estado, $codigo,$nombres]);

         return view('admin.reportes.index_asistencia', compact('asistencia_rpt', 'fecha_inicio', 'fecha_fin', 'estado','codigo','nombres'));
    }

	public function index_reportes_alumnos(Request $request)
    {


        $tb_dni = DB::table('bsd_alumno')->pluck('dni');
        for ($i = 0; $i < count($tb_dni); $i++) {
            $b_code = new DNS1D();
            $b_code->setStorPath('./img/cod_bar/');
            $b_code->getBarcodePNGPath($tb_dni[$i], 'C128');
        }

        return view('admin.reportes.index_reportes_alumnos');
    }

    public function consultar_asistencias(Request $request)
    {
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $estado = $request->estado;
        $codigo = ($request->codigo == null || $request->codigo == '') ? '%' : $request->codigo;
        $nombres = ($request->nombres == null || $request->nombres == '') ? '%' : $request->nombres;

        $asistencia_rpt = DB::select('CALL sp_asistencia_rpt(?,?,?,?,?)',
        [$fecha_inicio, $fecha_fin, $estado,$codigo,$nombres]);

        return view('admin.reportes.index_asistencia', compact('asistencia_rpt', 'fecha_inicio', 'fecha_fin','estado','codigo','nombres'));
    }

   public function index_justificaciones(Request $request)
    {
        $fecha_inicio = $request->fecha_inicio; // obtener fecha de alguna manera;
        $fecha_fin = $request->fecha_fin; // obtener fecha de alguna manera;
        $estado = $request->estado;
        $codigo = $request->codigo;
        // Consulta a la base de datos u otras operaciones necesarias
        $justificacion_rpt = DB::select('CALL sp_justificacion_rpt(?,?,?,?)', [$fecha_inicio, $fecha_fin,$estado,$codigo]);

        return view('admin.reportes.index_justificacion', compact('justificacion_rpt', 'fecha_inicio', 'fecha_fin','estado','codigo'));
    }

    public function consultar_justificacion(Request $request){
        //dd($request);
        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $estado = $request->estado;
        $codigo = ($request->codigo == null || $request->codigo == '') ? '%' : $request->codigo;

        $justificacion_rpt = DB::select('CALL sp_justificacion_rpt(?,?,?,?)', [$fecha_inicio, $fecha_fin, $estado, $codigo]);

        return view('admin.reportes.index_justificacion', compact('justificacion_rpt','fecha_inicio','fecha_fin','estado','codigo'));
    }
    /**
     * Show the form for creating a new resource.
     */

 	public function generarPDFAsistencias(Request $request)
     {

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        $estado = $request->estado ;
        $codigo = ($request->codigo == null || $request->codigo == '') ? '%' : $request->codigo;
        $nombres = ($request->nombres == null || $request->nombres == '') ? '%' : $request->nombres;

        $asistencia_rpt = DB::select('CALL sp_asistencia_rpt(?,?,?,?,?)',
        [$fecha_inicio, $fecha_fin, $estado,$codigo,$nombres]);

        $pdf = PDF::loadView('admin.reportes.asistencia_pdf', compact('asistencia_rpt', 'fecha_inicio', 'fecha_fin','estado','codigo','nombres'));

         return $pdf->download('reporte_asistencias.pdf');
     }

    public function generarPDFJustificaciones(Request $request)
    {
        $justificacion_rpt = DB::select('CALL sp_justificacion_rpt(?,?)', [$request->fecha_inicio, $request->fecha_fin]);

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;

        $pdf = PDF::loadView('admin.reportes.pdf_justificacion', compact('justificacion_rpt', 'fecha_inicio', 'fecha_fin'));

        return $pdf->download('reporte_justificaciones.pdf');
    }

	public function generarExcelAsistencias(Request $request)
    {
        $filtro = [
            'fecha_inicio' => $request->get('fecha_inicio'),
            'fecha_fin' => $request->get('fecha_fin'),
        ];

        $estado = $request->estado;
        $codigo = $request->codigo;
        $nombres = $request->nombres;

        $asistencia_rpt = new Reporte_asistencia_Export($filtro,$estado,$codigo,$nombres);

       // dd($asistencia_rpt);
        return Excel::download($asistencia_rpt, 'Reporte_de_asistencias.xlsx');
    }

    public function generarExcelJustificacion(Request $request)
    {
        $filtro = [
            'fecha_inicio' => $request->get('fecha_inicio'),
            'fecha_fin' => $request->get('fecha_fin'),
        ];

        $justificacion_rpt = new Reporte_justificacion_Export($filtro);
        return Excel::download($justificacion_rpt, 'Reporte_de_justificaciones.xlsx');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
