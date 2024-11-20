<?php

namespace Database\Seeders;

use App\Models\Terminal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Terminal::create([
            'merchant_id' => 7000679,
            'provision_user_id' => 'PROVAUT',
            'terminal_id' => 30691297,
            'store_key' => 12345678,
            'provision_user_password' => config('services.payment-providers.garanti.env.test.password'),
        ]);
    }
}
