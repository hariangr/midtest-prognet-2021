<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'angkatan',
        'active',
    ];

    public function kartu_studis()
    {
        return KartuStudi::where('mahasiswas_id', $this->id)->get();
    }
}
