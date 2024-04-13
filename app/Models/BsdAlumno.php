<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdAlumno extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'dni',
        'nombres',
        'ape_pat',
        'ape_mat',
    	'nom_completo',
        'codigo',
        'sexo',
    	'turno',
        'celular',
        'email',
        'anio',
        'fecha_nacimiento',
    	'image',
    	'proteccion_datos',
    	'ind_vigencia'
        // 'estado',
        // 'usuario_reg' ,
        // 'usuario_act' ,
        // 'created_at',
        // 'updated_at',       
     ] ;
        
    protected $table='bsd_alumno';
}