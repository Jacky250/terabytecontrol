<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name'=> 'Alejandro Pérez Macías',
            'email'=> 'alexe26@hotmail.com',
            'password'=> bcrypt('12345678')
        ]);

        $rol = Role::create(['name'=>'Administrador']);

        //$permisos = Permission::pluck('id', 'id')->all();

        //$rol->syncPermissions($permisos);

        $usuario->assignRole(['Administrador']);
    }
}
