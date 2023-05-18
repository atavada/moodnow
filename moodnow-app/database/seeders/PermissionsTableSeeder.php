<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //permission for dashboard
        Permission::create(['name' => 'dashboards.index']);

        //permission for quiz
        Permission::create(['name' => 'quizs.index']);
        Permission::create(['name' => 'quizs.create']);
        Permission::create(['name' => 'quizs.edit']);
        Permission::create(['name' => 'quizs.delete']);

        //permission for colors
        Permission::create(['name' => 'colors.index']);
        Permission::create(['name' => 'colors.create']);
        Permission::create(['name' => 'colors.edit']);
        Permission::create(['name' => 'colors.delete']);

        //permission for musics
        Permission::create(['name' => 'musics.index']);
        Permission::create(['name' => 'musics.create']);
        Permission::create(['name' => 'musics.edit']);
        Permission::create(['name' => 'musics.delete']);

        //permission for consuls
        Permission::create(['name' => 'consuls.index']);
        Permission::create(['name' => 'consuls.create']);
        Permission::create(['name' => 'consuls.edit']);
        Permission::create(['name' => 'consuls.delete']);

        //permission for roles
        Permission::create(['name' => 'roles.index']);
        // Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);
        
        //permission for permissions
        Permission::create(['name' => 'permissions.index']);
        
        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);

        //permission for detects
        Permission::create(['name' => 'detects.index']);
        Permission::create(['name' => 'detects.create']);
        Permission::create(['name' => 'detects.edit']);
        Permission::create(['name' => 'detects.delete']);
    }
}
