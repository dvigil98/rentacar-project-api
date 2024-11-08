<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Src\Users\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'David Vigil',
                'email' => 'david@email.com',
                'password' => 'password',
                'active' => true
            ]
        ];

        foreach ($users as $u) {
            $user = new User();
            $user->role_id = $u['role_id'];
            $user->name = $u['name'];
            $user->email = $u['email'];
            $user->password = Hash::make($u['password']);
            $user->active = $u['active'];
            $user->save();
        }
    }
}
