<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // * By default the role with id 1 is placed in the users
        Role::create([
            'name' => 'User',
        ]);
        Role::create([
            'name' => 'Admin',
        ]);
    }
}
