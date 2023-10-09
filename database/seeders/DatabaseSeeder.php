<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 1,
            'password' => Hash::make('password'), // Hash the password
        ],
        [
            'name' => 'testuser',
            'email' => 'usertest@admin.com',
            'role' => 0,
            'password' => Hash::make('test123'), // Hash the password
        
        ]
    );
        
    }
}
