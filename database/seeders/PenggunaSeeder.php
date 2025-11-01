<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('penggunas')->insert([
            [
                'nama' => 'Admin Utama',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role_id' => 1, // ID Administrasi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Desainer A',
                'username' => 'desain1',
                'email' => 'desain1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, // ID Desain
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Produksi A',
                'username' => 'produksi1',
                'email' => 'produksi1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 3, // ID Produksi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Manajer A',
                'username' => 'manajemen1',
                'email' => 'manajemen1@example.com',
                'password' => Hash::make('password'),
                'role_id' => 4, // ID Manajemen
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
