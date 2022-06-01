<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'npm', 'tanggal', 'jam', 'ruang', 'jenis', 'nilai'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'npm', 'npm');
    }

    public function daftar_hadir()
    {
        return $this->hasMany(DaftarHadir::class, 'seminar_proposal_id', 'id');
    }
}
