<?php

namespace Database\Seeders;

use App\Models\User;
<<<<<<< HEAD
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
=======
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
>>>>>>> 1df37db256d9068ed25ea4a04075fa430c840c6b

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
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
=======
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
>>>>>>> 1df37db256d9068ed25ea4a04075fa430c840c6b
    }
}
