<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'ZakyAdmin',
                'email' => 'zaky@admin.com',
                'password' => Hash::make('admin'),
                'jenis_kelamin' => 'L',
                'role' => 'Admin'
            ],
            [
                'name' => 'FathurMahasiswa',
                'email' => 'fathur@mahasiswa.com',
                'password' => Hash::make('mahasiswa'),
                'jenis_kelamin' => 'L',
                'role' => 'Mahasiswa'
            ],
            [
                'name' => 'RahmanPetugas',
                'email' => 'rahman@petugas.com',
                'password' => Hash::make('petugas'),
                'jenis_kelamin' => 'L',
                'role' => 'Petugas'
            ]
        ]);
    }
}
