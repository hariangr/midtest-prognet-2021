<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'matkuls_id',
        'dosens_id',
        'is_ongoing',
    ];

    public function matkul()
    {
        return Matkul::find($this->matkuls_id);
    }

    public function dosen()
    {
        return Dosen::find($this->dosens_id);
    }

    public function mahasiswas()
    {
        return KartuStudi::where('kelas_id', $this->id)->all();
    }
}
