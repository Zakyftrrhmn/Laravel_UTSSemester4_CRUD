<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjamen')->insert([
            [
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now(),
                'status' => 'Dipinjam'
            ],
            [
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => now(),
                'status' => 'Dikembalikan'
            ]
        ]);
    }
}
