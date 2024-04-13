<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BsdAsistencia extends Model
{
    use HasFactory;

    protected $fillable =[
        'dniA',
        'nombreA',
        'entradaA',
        'salidaA',
        'fechaA',
        'status'
    ];

    protected $table='bsd_asistencia';

	public function alumno()
    {
        // Establece la relación con BsdAlumno a través del campo 'dni'
        return $this->belongsTo(BsdAlumno::class, 'dniA', 'dni');
    }
	
	
}
