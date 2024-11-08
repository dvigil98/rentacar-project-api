<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Roles\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Module: Dashboard
            [
                'code' => 'ver_dashboard',
                'name' => 'Ver dashboard',
                'module' => 'Dashboard'
            ],
            // Module: Roles y permisos
            [
                'code' => 'listar_roles',
                'name' => 'Listar roles',
                'module' => 'Roles y permisos'
            ],
            [
                'code' => 'agregar_roles',
                'name' => 'Agregar roles',
                'module' => 'Roles y permisos'
            ],
            [
                'code' => 'editar_roles',
                'name' => 'Editar roles',
                'module' => 'Roles y permisos'
            ],
            [
                'code' => 'eliminar_roles',
                'name' => 'Eliminar roles',
                'module' => 'Roles y permisos'
            ],
            [
                'code' => 'ver_roles',
                'name' => 'Ver roles',
                'module' => 'Roles y permisos'
            ],
            [
                'code' => 'asignar_permisos_roles',
                'name' => 'Asignar permisos a roles',
                'module' => 'Roles y permisos'
            ],
            // Module: Usuarios
            [
                'code' => 'listar_usuarios',
                'name' => 'Listar usuarios',
                'module' => 'Usuarios'
            ],
            [
                'code' => 'agregar_usuarios',
                'name' => 'Agregar usuarios',
                'module' => 'Usuarios'
            ],
            [
                'code' => 'editar_usuarios',
                'name' => 'Editar usuarios',
                'module' => 'Usuarios'
            ],
            [
                'code' => 'eliminar_usuarios',
                'name' => 'Eliminar usuarios',
                'module' => 'Usuarios'
            ],
            [
                'code' => 'ver_usuarios',
                'name' => 'Ver usuarios',
                'module' => 'Usuarios'
            ]
        ];

        foreach ($permissions as $p) {
            $permission = new Permission();
            $permission->code = $p['code'];
            $permission->name = $p['name'];
            $permission->module = $p['module'];
            $permission->save();
        }
    }
}
