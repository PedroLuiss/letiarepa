<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@letiarepa.com'],
            [
                'name'     => 'Administrador',
                'password' => bcrypt('Letiarepa2024!'),
                'is_admin' => true,
            ]
        );
    }
}
