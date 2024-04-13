<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdJustificacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'dni',
        'fecha_reg',
        'justificacion',
        'observacion',
        'auditoria',
        'ind_vigencia',
        'usuario_upddate',
        'fecha_update'

     ] ;

     protected $table='bsd_justificacion';

	public function alumno()
    {
        return $this->belongsTo(BsdAlumno::class, 'dni', 'dni');
    }

    public function asistencia()
    {

        return $this->belongsTo(BsdAsistencia::class, 'dni', 'dniA');
    }

    public function motivo()
    {

        return $this->belongsTo(BsdMotivo::class, 'justificacion', 'nombre');
    }
}
