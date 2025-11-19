<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@figurarts.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'shipping_address' => null
        ]);

        // CLIENTE
        User::create([
            'name' => 'Cliente de Prueba',
            'email' => 'cliente@example.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'shipping_address' => 'Tokyo, Akihabara 1-2-3'
        ]);

        User::factory(5)->create([
            'role' => 'user'
        ]);
    }
}
