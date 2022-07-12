<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Yo, quien mas',
            'email' => 'test@test.com',
            'role_id' => 2,
            'password' => bcrypt('test123456')
        ]);
        User::factory(10)->create();
    }
}
