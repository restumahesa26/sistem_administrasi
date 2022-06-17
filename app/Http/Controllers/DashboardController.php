<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\SidangSkripsi;
use App\Models\Ujian;
use Carbon\Carbon;
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

        $semproCount = Ujian::where('jenis', 'Seminar Proposal')->whereBetween('tanggal', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        $semhasCount = Ujian::where('jenis', 'Seminar Hasil')->whereBetween('tanggal', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        $sidangCount = Ujian::where('jenis', 'Sidang Skripsi')->whereBetween('tanggal', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        return view('pages.dashboard', [
            'mahasiswa' => $mahasiswa, 'sempro' => $sempro, 'semhas' => $semhas, 'sidang' => $sidang, 'semproCount' => $semproCount, 'semhasCount' => $semhasCount, 'sidangCount' => $sidangCount
        ]);
    }
}
