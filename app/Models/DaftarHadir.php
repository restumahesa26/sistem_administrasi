<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarHadir extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'npm', 'nip', 'seminar_proposal_id'
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'npm', 'npm');
    }

    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'nip', 'nip');
    }

    public function seminar_proposal()
    {
        return $this->hasOne(Ujian::class, 'id', 'seminar_proposal_id');
    }
}
