<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('public/images');
        Storage::makeDirectory('public/images');

        $this->call('Database\Seeders\RoleSeeder');
        $this->call('Database\Seeders\UserSeeder');
        Category::factory(5)->create();
        Tag::factory(15)->create();
        $this->call('Database\Seeders\PostSeeder');
    }
}
