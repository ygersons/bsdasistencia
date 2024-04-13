<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Asistencia']);

        //permisos de usuarios


        //Permission::create(['name'=>'admin.users.update',
        //'description'=>''])->syncRoles([$role1]);;
        //permisos de alumnos
        Permission::create(['name' => 'adminlte.inicio_1', 'description' => 'Sección: Registros'])->syncRoles([$role1]);
        
       /* Permission::create([
            'name' => 'admin.alumnos.create',
            'description' => 'Crear alumnos'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.alumnos.edit',
            'description' => 'Editar alumnos'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.alumnos.destroy',
            'description' => 'Eliminar alumnos'
        ])->syncRoles([$role1]);
        */
        Permission::create([
            'name' => 'admin.alumnos.indexf',
            'description' => 'Lista de alumnos'
        ])->syncRoles([$role1]);
    
    	Permission::create([
            'name' => 'admin.turnos.indexf',
            'description' => 'Lista de Turnos'
        ])->syncRoles([$role1]);
    
        Permission::create([
            'name' => 'admin.parents.indexf',
            'description' => 'Lista de Parientes'
        ])->syncRoles([$role1]);
        
        
        //permisos de profesores

        /*Permission::create(['name' => 'adminlte.profesores', 'description' => 'Sección: Profesores'])->syncRoles([$role1]);
        Permission::create([
            'name' => 'admin.profesores.index',
            'description' => 'Lista de profesores'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.profesores.create',
            'description' => 'Crear profesores'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.profesores.edit',
            'description' => 'Editar profesores'
        ])->syncRoles([$role1]);
        
        Permission::create([
            'name' => 'admin.profesores.destroy',
            'description' => 'Eliminar profesores'
        ])->syncRoles([$role1]);*/

        Permission::create(['name' => 'adminlte.inicio_2', 'description' => 'Sección: Procesos'])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.asistencia.control',
            'description' => 'Ver Asistencia'
        ])->syncRoles([$role1,$role2]);

        Permission::create([
            'name' => 'admin.asistencia.index',
            'description' => 'Ver reloj'
        ])->syncRoles([$role1]);

        /*Permission::create([
            'name' => 'admin.justificacion.create',
            'description' => 'Crear justificacion'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.justificacion.show',
            'description' => 'Ver justificacion'
        ])->syncRoles([$role1]);
            */
        Permission::create([
            'name' => 'admin.justificacion.indexf',
            'description' => 'Lista de justificaciones'
        ])->syncRoles([$role1]);

        


        // seccion Reportes
            
        Permission::create(['name' => 'adminlte.inicio_3', 'description' => 'Sección: Reportes'])->syncRoles([$role1]);

        /*Permission::create([
            'name' => 'admin.reportes.consultar_asistencias',
            'description' => 'Consultar asistencia'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.reportes.consultar_justificacion',
            'description' => 'Consultar Justificaciones'
        ])->syncRoles([$role1]);
            */
        Permission::create([
            'name' => 'admin.reportes.index_justificacion',
            'description' => 'Reporte de Justificaciones'
        ])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.reportes.indexf_asistencia',
            'description' => 'Reporte de Asistencia'
        ])->syncRoles([$role1]); 

        

        //Seccion de usuario esto se llamara la seccion de configuracion 
        Permission::create(['name' => 'adminlte.inicio_4', 'description' => 'Sección: Configuraciones'])->syncRoles([$role1]);

        Permission::create([
            'name' => 'admin.home',
            'description' => 'Ver el dashboard'
        ])->syncRoles([$role1, $role2]);

        /*Permission::create([
            'name' => 'admin.users.edit',
            'description' => 'Asignar un rol'
        ])->syncRoles([$role1]);
        */
        //permisos de roles
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.indexf', 'description' => 'Usuarios'])->syncRoles([$role1]);
        /*Permission::create(['name'=>'admin.justificacion.destroy',
                            'description'=>'Eliminar alumnos'])->syncRoles([$role1]);;*/
    }
}
