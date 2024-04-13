<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdHorario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
    	'orden',
        'fecha_ini',
        'fecha_fin',
        'hora_ini',
        'hora_fin',
        'ind_vigencia',
        'usuario_reg',
        'usuario_act',

    ];
    protected $table = 'bsd_horario';
}
