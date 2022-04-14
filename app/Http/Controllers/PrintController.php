<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\SidangSkripsi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function view_berita_acara_sempro()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();

        return view('pages.print.berita_acara_sempro', [
            'mahasiswas' => $mahasiswa, 'dosens' => $dosen
        ]);
    }

    public function print_berita_acara_sempro(Request $request)
    {
        $npmMahasiswa = $request->npm;
        $nipDosen = array();
        $statusKelayakan = $request->status;
        $ketuaPenguji = $request->nip_ketua_penguji;

        $checkMahasiswa = SeminarProposal::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();
            $ketuaPenguji = Dosen::where('nip', $ketuaPenguji)->first();

            foreach ($request->nip as $value) {
                $dosen = Dosen::where('nip', $value)->first();

                $nipDosen[] = $dosen;
            }

            return view('pages.view-print.view_berita_acara_sempro', [
                'mahasiswa' => $mahasiswa, 'dosens' => $nipDosen, 'kelayakan' => $statusKelayakan, 'ketua_penguji' => $ketuaPenguji, 'data_sempro' => $checkMahasiswa
            ]);
        }else {
            return redirect()->back()->withInput()->with('error', 'Mahasiswa Belum Terdaftar Di Seminar Proposal');
        }
    }

    public function view_berita_acara_semhas()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();

        return view('pages.print.berita_acara_semhas', [
            'mahasiswas' => $mahasiswa, 'dosens' => $dosen
        ]);
    }

    public function print_berita_acara_semhas(Request $request)
    {
        $npmMahasiswa = $request->npm;
        $ketuaPenguji = $request->nip_ketua_penguji;
        $koordinator = $request->nip_koordinator;
        $now = Carbon::now();

        $checkMahasiswa = SeminarHasil::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa2 = SeminarProposal::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL && $checkMahasiswa2 !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();
            $ketuaPenguji = Dosen::where('nip', $ketuaPenguji)->first();
            $koordinator = Dosen::where('nip', $koordinator)->first();

            return view('pages.view-print.view_berita_acara_semhas', [
                'mahasiswa' => $mahasiswa, 'ketua_penguji' => $ketuaPenguji, 'koordinator' => $koordinator, 'data_semhas' => $checkMahasiswa, 'now' => $now
            ]);
        }else {
            return redirect()->back()->withInput()->with('error', 'Mahasiswa Belum Terdaftar Di Seminar Hasil');
        }
    }

    public function view_berita_acara_sidang_skripsi()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();

        return view('pages.print.berita_acara_sidang_skripsi', [
            'mahasiswas' => $mahasiswa, 'dosens' => $dosen
        ]);
    }

    public function print_berita_acara_sidang_skripsi(Request $request)
    {
        $npmMahasiswa = $request->npm;
        $ketuaPenguji = $request->nip_ketua_penguji;
        $koordinator = $request->nip_koordinator;
        $now = Carbon::now();

        $checkMahasiswa = SeminarHasil::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa2 = SeminarProposal::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa3 = SidangSkripsi::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL && $checkMahasiswa2 !== NULL && $checkMahasiswa3 !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();
            $ketuaPenguji = Dosen::where('nip', $ketuaPenguji)->first();
            $koordinator = Dosen::where('nip', $koordinator)->first();

            return view('pages.view-print.view_berita_acara_sidang_skripsi', [
                'mahasiswa' => $mahasiswa, 'ketua_penguji' => $ketuaPenguji, 'koordinator' => $koordinator, 'data_sidang' => $checkMahasiswa3, 'now' => $now
            ]);
        }else {
            return redirect()->back()->withInput()->with('error', 'Mahasiswa Belum Terdaftar Di Sidang Skripsi');
        }
    }

    public function view_daftar_hadir_seminar_hasil_dosen()
    {
        $mahasiswa = Mahasiswa::all();

        return view('pages.print.daftar_hadir_semhas_dosen', [
            'mahasiswas' => $mahasiswa
        ]);
    }

    public function print_daftar_hadir_seminar_hasil_dosen(Request $request)
    {
        $npmMahasiswa = $request->npm;

        $checkMahasiswa = SeminarHasil::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa2 = SeminarProposal::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL && $checkMahasiswa2 !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();

            return view('pages.view-print.view_daftar_hadir_seminar_hasil_dosen', [
                'mahasiswa' => $mahasiswa, 'data_semhas' => $checkMahasiswa
            ]);
        }else {
            return redirect()->back()->withInput();
        }
    }

    public function view_daftar_hadir_seminar_hasil_mahasiswa()
    {
        $mahasiswa = Mahasiswa::all();

        return view('pages.print.daftar_hadir_semhas_mahasiswa', [
            'mahasiswas' => $mahasiswa
        ]);
    }

    public function print_daftar_hadir_seminar_hasil_mahasiswa(Request $request)
    {
        $npmMahasiswa = $request->npm;
        $number = $request->number;

        $checkMahasiswa = SeminarHasil::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa2 = SeminarProposal::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL && $checkMahasiswa2 !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();

            return view('pages.view-print.view_daftar_hadir_seminar_hasil_mahasiswa', [
                'mahasiswa' => $mahasiswa, 'data_semhas' => $checkMahasiswa, 'number' => $number
            ]);
        }else {
            return redirect()->back()->withInput();
        }
    }

    public function view_undangan()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();

        return view('pages.print.undangan', [
            'mahasiswas' => $mahasiswa, 'dosens' => $dosen
        ]);
    }

    public function print_undangan(Request $request)
    {
        $npmMahasiswa = $request->npm;
        $nomorSurat = $request->nomor_surat;
        $koordinator = $request->nip_koordinator;

        $checkMahasiswa = SeminarHasil::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa2 = SeminarProposal::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa3 = SidangSkripsi::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL && $checkMahasiswa2 !== NULL && $checkMahasiswa3 !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();
            $koordinator = Dosen::where('nip', $koordinator)->first();

            return view('pages.view-print.view_undangan', [
                'mahasiswa' => $mahasiswa, 'data_sidang' => $checkMahasiswa3, 'nomor_surat' => $nomorSurat, 'koordinator' => $koordinator
            ]);
        }else {
            return redirect()->back()->withInput();
        }
    }

    public function view_form_nilai()
    {
        $mahasiswa = Mahasiswa::all();

        return view('pages.print.form_nilai', [
            'mahasiswas' => $mahasiswa
        ]);
    }

    public function print_form_nilai(Request $request)
    {
        $npmMahasiswa = $request->npm;

        $checkMahasiswa = SeminarHasil::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa2 = SeminarProposal::where('npm', $npmMahasiswa)->first();
        $checkMahasiswa3 = SidangSkripsi::where('npm', $npmMahasiswa)->first();

        if ($checkMahasiswa !== NULL && $checkMahasiswa2 !== NULL && $checkMahasiswa3 !== NULL) {
            $mahasiswa = Mahasiswa::where('npm', $npmMahasiswa)->first();

            return view('pages.view-print.view_form_nilai', [
                'mahasiswa' => $mahasiswa, 'data_sidang' => $checkMahasiswa3,
            ]);
        }else {
            return redirect()->back()->withInput();
        }
    }

    public function view_laporan_sidang()
    {
        $items = Mahasiswa::all();

        return view('pages.print.laporan_sidang', [
            'items' => $items
        ]);
    }

    public function print_laporan_sidang()
    {
        $items = Mahasiswa::all();

        return view('pages.view-print.view_laporan_sidang', [
            'items' => $items
        ]);
    }
}