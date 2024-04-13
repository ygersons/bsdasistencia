<?php

namespace App\Imports;

use App\Models\BsdApoderado;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ApoderadosImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        $existingApoderado = BsdApoderado::where('dni_alumno', $row['dni_alumno'])
            ->first();

        // Si ya existe, puedes actualizar los datos en lugar de crear uno nuevo
        if ($existingApoderado) {
            $existingApoderado->update([
                'doc_identidad' => $row['doc_identidad'],
                'nro_doc_iden' => $row['nro_doc_iden'],
                'ape_pat' => $row['ape_pat'],
                'ape_mat' => $row['ape_mat'],
                'nombres' => $row['nombres'],
                'celular' => $row['celular'],
                'email' => $row['email'],
                'sexo' => $row['sexo'],
                'dni_alumno' => $row['dni_alumno'],
                'parentesco' => $row['parentesco'],
                'ind_vigencia' => $row['ind_vigencia'],
            ]);
            return null; // Devolver null para indicar que no se debe crear un nuevo registro
        }


        return new BsdApoderado([
            'doc_identidad' => $row['doc_identidad'],
            'nro_doc_iden' => $row['nro_doc_iden'],
            'ape_pat' => $row['ape_pat'],
            'ape_mat' => $row['ape_mat'],
            'nombres' => $row['nombres'],
            'celular' => $row['celular'],
            'email' => $row['email'],
            'sexo' => $row['sexo'],
            'dni_alumno' => $row['dni_alumno'],
            'parentesco' => $row['parentesco'],
            'ind_vigencia' => $row['ind_vigencia'],
        ]);
    }
}
