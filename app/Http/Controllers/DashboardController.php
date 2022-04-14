<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\SidangSkripsi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // ambil data mahasiswa
        $mahasiswa = Mahasiswa::count();

        // ambil data sempro
        $sempro = SeminarProposal::count();

        // ambil data semhas
        $semhas = SeminarHasil::count();

        // ambil data sidang
        $sidang = SidangSkripsi::count();

        return view('pages.dashboard', [
            'mahasiswa' => $mahasiswa, 'sempro' => $sempro, 'semhas' => $semhas, 'sidang' => $sidang
        ]);
    }
}
