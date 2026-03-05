<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@workshop.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create demo student user
        User::factory()->create([
            'name' => 'Demo Student',
            'email' => 'student@workshop.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $this->call(EventSeeder::class);
    }
}
