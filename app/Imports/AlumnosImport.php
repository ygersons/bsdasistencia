<?php

namespace App\Imports;

use App\Models\BsdAlumno;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $existingAlumno = BsdAlumno::where('dni', $row['dni'])
            ->orWhere('codigo', $row['codigo'])
            ->first();

        // Si ya existe, puedes actualizar los datos en lugar de crear uno nuevo
        if ($existingAlumno) {
            $existingAlumno->update([
                'anio' => $row['anio'],
                'codigo' => $row['codigo'],
                'ape_pat' => $row['ape_pat'],
                'ape_mat' => $row['ape_mat'],
                'nombres' => $row['nombres'],
                'image' => $row['image'],
            ]);
            return null; // Devolver null para indicar que no se debe crear un nuevo registro
        }

        return new BsdAlumno([
            'anio' => $row['anio'],
            'codigo' => $row['codigo'],
            'dni' => $row['dni'],
            'ape_pat' => $row['ape_pat'],
            'ape_mat' => $row['ape_mat'],
            'nombres' => $row['nombres'],
        	'image' => $row['image'],
        	'proteccion_datos' => $row['proteccion_datos'],
        ]);
    }
}
