<?php

namespace Database\Seeders;

use App\Models\TodoList;
use App\Models\User;
use App\Models\UserInfo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $user = User::factory(10)->create();

        
        // TodoList::factory(100)
        //     ->recycle($user)
        //     ->create();
        UserInfo::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



    }
}
