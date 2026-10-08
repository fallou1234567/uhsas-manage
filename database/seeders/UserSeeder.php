<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's users.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@uhsas.sn',
            ],
            [
                'name' => 'Administrateur UHSAS',
                'password' => Hash::make('UHSAS@2026'),
                'email_verified_at' => now(),
            ]
        );
    }
}