<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function dosen(Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        $dosen_pembimbing_1 = Mahasiswa::where('npm', $mahasiswa)
        ->join('dosens AS dosen', 'dosen.nip', '=', 'mahasiswas.pembimbing_1')
        ->pluck('dosen.nama', 'dosen.nip');

        $dosen_pembimbing_2 = Mahasiswa::where('npm', $mahasiswa)
        ->join('dosens AS dosen', 'dosen.nip', '=', 'mahasiswas.pembimbing_2')
        ->pluck('dosen.nama', 'dosen.nip');

        $dosen_penguji_1 = Mahasiswa::where('npm', $mahasiswa)
        ->join('dosens AS dosen', 'dosen.nip', '=', 'mahasiswas.penguji_1')
        ->pluck('dosen.nama', 'dosen.nip');

        $dosen_penguji_2 = Mahasiswa::where('npm', $mahasiswa)
        ->join('dosens AS dosen', 'dosen.nip', '=', 'mahasiswas.penguji_2')
        ->pluck('dosen.nama', 'dosen.nip');


        return response()->json([
            'dosen_pembimbing_1' => $dosen_pembimbing_1, 'dosen_pembimbing_2' => $dosen_pembimbing_2, 'dosen_penguji_1' => $dosen_penguji_1, 'dosen_penguji_2' => $dosen_penguji_2,
        ]);
    }
}
