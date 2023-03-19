<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin MoodNow',
               'email'=>'admin@gmail.com',
               'type'=>1,
               'password'=> bcrypt('123'),
            ],
            [
               'name'=>'Operator MoodNow',
               'email'=>'operator@gmail.com',
               'type'=> 2,
               'password'=> bcrypt('123'),
            ],
            [
                'name'=>'Sobat MoodNow',
                'email'=>'sobat@gmail.com',
                'type'=> 3,
                'password'=> bcrypt('123'),
             ],
            [
               'name'=>'User',
               'email'=>'user@gmail.com',
               'type'=>0,
               'password'=> bcrypt('123'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
