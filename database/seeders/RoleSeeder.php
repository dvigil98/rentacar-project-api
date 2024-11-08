<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Src\Roles\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Administrador'
            ]
        ];

        foreach ($roles as $r) {
            $roles = new Role();
            $roles->name = $r['name'];
            $roles->save();
        }
    }
}
