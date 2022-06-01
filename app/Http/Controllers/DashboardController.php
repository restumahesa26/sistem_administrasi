<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\SidangSkripsi;
use App\Models\Ujian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // ambil data mahasiswa
        $mahasiswa = Mahasiswa::count();

        // ambil data sempro
        $sempro = Ujian::where('jenis', 'Seminar Proposal')->count();

        // ambil data semhas
        $semhas = Ujian::where('jenis', 'Seminar Hasil')->count();

        // ambil data sidang
        $sidang = Ujian::where('jenis', 'Sidang Skripsi')->count();

        return view('pages.dashboard', [
            'mahasiswa' => $mahasiswa, 'sempro' => $sempro, 'semhas' => $semhas, 'sidang' => $sidang
        ]);
    }
}
