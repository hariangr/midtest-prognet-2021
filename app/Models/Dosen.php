<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nidn',
        'nama',
        'email',
        'active',
    ];

    public function kelas()
    {
        return Kelas::where('dosens_id', $this->id)->get();
    }
}
