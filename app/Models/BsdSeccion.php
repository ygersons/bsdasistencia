<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdSeccion extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_grado',
        'codigo',
        'nombre',
        'descripcion',
        'ind_vigencia',
    ];

    protected $table='bsd_seccion';

    public function grado()
    {
        return $this->belongsTo(BsdGrado::class, 'id_grado','id');
    }

}
