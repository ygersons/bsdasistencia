<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class UserSeeder extends Seeder
{
    /**
     * @return void Run the database seeds.
     */
    
    public function run()
    {
        User::create([
            'name'=>'Aministrador',
            'email'=>'yuin21@hotmail.com',
            'password'=> bcrypt('Admin2023')
        ])->assignRole('Admin');

        User::create([
            'name'=>'Herber',
            'email'=>'hejesus@hotmail.com',
            'password'=> bcrypt('Admin123')
        ])->assignRole('Admin');

        User::create([
            'name'=>'Melvin',
            'email'=>'marcial_2_3@hotmail.com ',
            'password'=> bcrypt('Admin2023')
        ])->assignRole('Asistencia');


        
    }
    
}
