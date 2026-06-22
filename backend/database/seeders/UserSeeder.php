<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [[
            'name' => 'Test User',
            'email' => 'test@example.com',
        ],[
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
        ],[
            'name' => 'Test User 3',
            'email' => 'test3@example.com',
        ],[
            'name' => 'Test User 4',
            'email' => 'test4@example.com',
        ],[
            'name' => 'Test User 5',
            'email' => 'test5@example.com',
        ],[
            'name' => 'Test User 6',
            'email' => 'test6@example.com',
        ],[
            'name' => 'Test User 7',
            'email' => 'test7@example.com',
        ],[
            'name' => 'Test User 8',
            'email' => 'test8@example.com',
        ],[
            'name' => 'Test User 9',
            'email' => 'test@9example.com',
        ]];

        foreach($users as $user){
            User::factory()->create($user);
        }
    }
}
