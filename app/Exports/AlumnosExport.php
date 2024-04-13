<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use App\Models\BsdAlumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AlumnosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $filtro;

    // Constructor que recibe el filtro como parámetro
    public function __construct($filtro)
    {
        $this->filtro = $filtro;

    }

    public function headings(): array
    {
        return [
            'N°',
            'Año',
            'Codigo',
            'DNI',
            'Apellido Paterno',
            'Apellido Materno',
            'Nombres',
            'Foto',
        ];
    }

    public function collection()
    {
        $filtro= $this->filtro;

        // Realiza la consulta en función del filtro
        $alumnos = BsdAlumno::select(
            DB::raw('ROW_NUMBER() OVER (ORDER BY id) as contador'),
            'anio',
            'codigo',
            'dni',
            'ape_pat',
            'ape_mat',
            'nombres',
            'image'
        )->where('codigo', 'LIKE', $filtro . '%')->get();

        return $alumnos;

    }
}
