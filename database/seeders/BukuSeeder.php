<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bukus')->insert([
            [
                'judul' => 'Buku 1',
                'penerbit' => 'erlangga',
                'pengarang' => 'Zaky',
                'tahun' => 2023,
                'stok' => 10
            ],
            [
                'judul' => 'Buku 2',
                'penerbit' => 'erlangga',
                'pengarang' => 'Fathur',
                'tahun' => 2023,
                'stok' => 10
            ],
            [
                'judul' => 'Buku 3',
                'penerbit' => 'erlangga',
                'pengarang' => 'Rahman',
                'tahun' => 2023,
                'stok' => 10
            ]
        ]);
    }
}
