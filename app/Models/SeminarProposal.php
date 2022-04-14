<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'npm', 'tanggal_sempro', 'jam', 'ruang'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'npm', 'npm');
    }
}
