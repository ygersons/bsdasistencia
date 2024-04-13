<?php

namespace App\Exports;

use App\Models\BsdAsistencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Reporte_asistencia_Export implements FromCollection, WithHeadings
{
    private $filtro;
    private $estado;
    private $codigo;
    private $nombres;

    public function __construct($filtro, $estado,$codigo,$nombres)
    {
        $this->filtro = $filtro;
        $this->estado = $estado;
        $this->codigo = $codigo;
        $this->nombres = $nombres;
    }

    public function headings(): array
    {
        return [
            'N°',
            'DNI',
            'Código',
            'Nombre',
            'Entrada',
            'Salida',
            'Fecha',
            'Estado',
        ];
    }

    public function collection()
    {
        $filtro = $this->filtro;
        $estado = $this->estado;
        $codigo = $this->codigo;
        $nombres = $this->nombres;

        $asistencias = BsdAsistencia::select(
            DB::raw('ROW_NUMBER() OVER (ORDER BY entradaA) as contador'),
            'dniA',
            'alumno.codigo',
            'nombreA',
            'entradaA',
            'salidaA',
            'fechaA',
            'status'
        )
            ->leftJoin('bsd_alumno as alumno', 'dniA', '=', 'dni')
            ->whereBetween('fechaA', [$filtro['fecha_inicio'], $filtro['fecha_fin']])
            ->where('nombreA','LIKE', $nombres)
            ->where('status', 'LIKE', $estado)
            ->whereHas('alumno', function($query) use ($codigo) {
                $query->where('codigo', 'LIKE', $codigo);
            })

            ->get();
            //dd($asistencias);

        // Cargar la relación 'alumno' para cada asistencia

        return $asistencias;
    }
}
