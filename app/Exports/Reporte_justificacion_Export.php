<?php

namespace App\Exports;


use App\Models\BsdJustificacion;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Reporte_justificacion_Export implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    private $filtro;

    public function __construct($filtro)
    {
        $this->filtro = $filtro;
    }

    public function headings(): array
    {
        return [
            'N¡Æ',
            'Codigo',
            'DNI',
            'Fecha registrada',
            'Justificacion',
            'Observacion',
            'Estado',
        ];
    }

    public function collection()
    {
        $filtro = $this->filtro;

        $justificacion = BsdJustificacion::select(
            DB::raw('ROW_NUMBER() OVER (ORDER BY id) as contador'),
            'codigo',
            'dni',
            'fecha_reg',
            'justificacion',
            'observacion',
            'ind_vigencia'
        )

            ->whereBetween('fecha_reg', [$filtro['fecha_inicio'], $filtro['fecha_fin']])
            ->get();

        
        return $justificacion;
    }
} 