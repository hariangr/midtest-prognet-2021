<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuStudi extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswas_id',
        'kelas_id',
    ];

    public function mahasiswa()
    {
        return Mahasiswa::find($this->mahasiswas_id);
    }

    public function kelas()
    {
        return Kelas::find($this->kelas_id);
    }

    public function matkul()
    {
        return Kelas::find($this->kelas_id)->matkul();
    }
}
