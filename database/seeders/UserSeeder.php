<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Klinik',
            'email' => 'admin@klinik.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dokter Umum',
            'email' => 'dokter@klinik.com',
            'password' => bcrypt('password'),
            'role' => 'dokter',
        ]);

        User::create([
            'name' => 'Kasir Klinik',
            'email' => 'kasir@klinik.com',
            'password' => bcrypt('password'),
            'role' => 'kasir',
        ]);

        User::create([
            'name' => 'Petugas Pendaftaran',
            'email' => 'pendaftaran@klinik.com',
            'password' => bcrypt('password'),
            'role' => 'pendaftaran',
        ]);
    }
}
