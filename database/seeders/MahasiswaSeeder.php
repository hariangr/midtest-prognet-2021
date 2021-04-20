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
            'nim' => "1905551001",
            'nama' => "Fatliana Kamsia",
            'angkatan' => 2019,
            'active' => True,
        ]);
        Mahasiswa::factory()->create([
            'nim' => "1905551002",
            'nama' => "Shilta Inda Qurroti A'yun Achmadi	",
            'angkatan' => 2019,
            'active' => True,
        ]);
        Mahasiswa::factory()->create([
            'nim' => "1905551003",
            'nama' => "I Made Andre Dwi Winama Putra",
            'angkatan' => 2019,
            'active' => True,
        ]);
        Mahasiswa::factory()->create([
            'nim' => "1905551004",
            'nama' => "Anak Agung Ngurah Upadana Dinata",
            'angkatan' => 2019,
            'active' => True,
        ]);
        Mahasiswa::factory()->create([
            'nim' => "1905551005",
            'nama' => "Kadek Eka Yuda Trisna S",
            'angkatan' => 2019,
            'active' => True,
        ]);
    }
}
