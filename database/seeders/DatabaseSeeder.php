<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //varianta 1
        // \App\Models\User::factory(10)->create();

        ///varianta 2
        \App\Models\User::factory()->create([
            'name' => 'Test User2',
            'last_name' => 'Test User2',
            'email' => 'tes2t@example.com2',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User3',
            'last_name' => 'Test User4',
            'email' => 'tes3t@example.com2',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User4',
            'last_name' => 'Test User4',
            'email' => 'test3@example.com2',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User4',
            'last_name' => 'Test User4',
            'email' => 'test4@example.com4',
        ]);
    }
}
