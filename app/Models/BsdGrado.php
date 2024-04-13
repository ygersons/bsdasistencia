<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdGrado extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'codigo',
        'nombre',
        'descripcion',
        'ind_vigencia',
        'usuario_reg',
        'usuario_act'
    ];
    protected $table='bsd_grado';
}
