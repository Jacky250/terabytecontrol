<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Spatie
use Spatie\Permission\Models\Permission;

class SeederTablePermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        $permisos = [
          //tabla user
          'ver-user',
          'crear-user',
          'editar-user',
          'borrar-user',
          //tabla roles
          'ver-rol',
          'crear-rol',
          'editar-rol',
          'borrar-rol',
          //tabla-locaciones
          'ver-local',
          'crear-local',
          'editar-local',
          'borrar-local',
          //tabla-fibra
          'ver-fibra',
          'crear-fibra',
          'editar-fibra',
          'borrar-fibra',
          //tabla-inalambrica 
          'ver-inalambrica',
          'crear-inalambrica',
          'editar-inalambrica',
          'borrar-inalambrica'
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
    
}
