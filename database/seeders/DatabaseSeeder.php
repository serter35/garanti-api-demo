<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            // şifre: password
        ])->roles()->attach([1]);

        User::factory()->create([
            'name' => 'Viewer User',
            'email' => 'viewer@example.com',
            // şifre: password
        ])->roles()->attach([2]);

        $this->call([
            CustomerSeeder::class,
            OrderSeeder::class,
            TerminalSeeder::class,
        ]);
    }
}
