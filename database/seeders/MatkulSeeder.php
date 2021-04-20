<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'tib','tic','mkj','mb'
        Matkul::factory()->create([
            'title' => "Bahasa Indonesia",
            'key' => "TIB01",
            'active' => True,
            'concentration' => "tib",
        ]);
        Matkul::factory()->create([
            'title' => "Algoritma",
            'key' => "TIC01",
            'active' => True,
            'concentration' => "tic",
        ]);
        Matkul::factory()->create([
            'title' => "Pemrograman",
            'key' => "mkj01",
            'active' => True,
            'concentration' => "mkj",
        ]);
    }
}
