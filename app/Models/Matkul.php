<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'key',
        'concentration',
        'active',
    ];

    public function pembimbings()
    {
        return Kelas::where('matkuls_id', $this->id)->get();
    }
}
