<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdMotivo extends Model
{
    use HasFactory;

    protected $fillable =[
        'id',
        'nombre',
        'descripcion',
        'ind_vigencia',
        'usuario_reg',
        'usuario_act'
    ];
    protected $table='bsd_motivo';
}
