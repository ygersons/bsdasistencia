<?php

namespace Database\Seeders;
use App\Models\BsdAlumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BsdAlumno::create([
        'dni'=> '45872168',
        'nombres'=> 'juan',
        'ape_pat'=> 'romero',
        'ape_mat'=> 'juarez',
        'sexo'=> 'masculino',
        'celular'=> '987635482',
        'email'=> 'juanio@gmail.com',
    ]); 
    }
}
