<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::factory()->create([
            'nim' => "1905551023",
            'nama' => "Hari Anugrah",
            'angkatan' => 2019,
            'active' => False,
        ]);
        Mahasiswa::factory()->create([
            'nim' => "1905551024",
            'nama' => "Letisha Delta",
            'angkatan' => 2019,
            'active' => True,
        ]);
    }
}
