<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdApoderado extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'doc_identidad',
        'nro_doc_iden',
        'ape_pat',
        'ape_mat',
        'nombres',
    	'nom_completo',
        'celular',
        'email',
        'sexo',
        'dni_alumno',
        'parentesco',
        'ind_vigencia',
        'usuario_crea',
        'usuario_act'
    ];

    protected $table='bsd_apoderado';

	public function alumno()
    {
        return $this->belongsTo(BsdAlumno::class, 'dni_alumno','dni');
    }
}
