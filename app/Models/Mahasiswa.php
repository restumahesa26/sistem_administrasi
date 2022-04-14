<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'npm', 'nama', 'judul', 'pembimbing_1', 'pembimbing_2', 'penguji_1', 'penguji_2'
    ];

    public function dosen_pembimbing_1()
    {
        return $this->hasOne(Dosen::class, 'nip', 'pembimbing_1');
    }

    public function dosen_pembimbing_2()
    {
        return $this->hasOne(Dosen::class, 'nip', 'pembimbing_2');
    }

    public function dosen_penguji_1()
    {
        return $this->hasOne(Dosen::class, 'nip', 'penguji_1');
    }

    public function dosen_penguji_2()
    {
        return $this->hasOne(Dosen::class, 'nip', 'penguji_2');
    }

    public function sempro()
    {
        return $this->hasOne(SeminarProposal::class, 'npm', 'npm');
    }

    public function semhas()
    {
        return $this->hasOne(SeminarHasil::class, 'npm', 'npm');
    }

    public function sidang()
    {
        return $this->hasOne(SidangSkripsi::class, 'npm', 'npm');
    }
}
