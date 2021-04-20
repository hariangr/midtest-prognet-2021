<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::factory()->create([
            'nidn' => "0809058502",
            'nama' => "Ni Kadek Dwi Rusjayanthi, S.T., M.T.",
            'email' => "dwi.rusjayanthi@unud.ac.id",
            'active' => True,
        ]);
        Dosen::factory()->create([
            'nidn' => "8862650017",
            'nama' => "Kadek S W",
            'email' => "suar_wibawa@yahoo.com",
            'active' => True,
        ]);
        Dosen::factory()->create([
            'nidn' => "0003118509",
            'nama' => "I Putu Agus Eka Pratama, S.T., M.T.",
            'email' => "eka.pratama@unud.ac.id",
            'active' => True,
        ]);
        Dosen::factory()->create([
            'nidn' => "0024047406",
            'nama' => "Prof. Dr. I Ketut Gede Darma Putra, S.Kom., M.T.",
            'email' => "ikgdarmaputra@unud.ac.id",
            'active' => True,
        ]);
        Dosen::factory()->create([
            'nidn' => "0809058502",
            'nama' => "Dr. A.A. Kompiang Oka Sudana, S.Kom., M.T.",
            'email' => "agungokas@unud.ac.id",
            'active' => True,
        ]);
    }
}
