<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SidangSkripsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'npm', 'tanggal_sidang', 'jam', 'ruang'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'npm', 'npm');
    }
}
