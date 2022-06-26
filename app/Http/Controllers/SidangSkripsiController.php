<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\SidangSkripsi;
use App\Models\Ujian;
use Illuminate\Http\Request;

class SidangSkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data sidang urutkan berdasarkan tanggal terbaru
        $items = Ujian::where('jenis', 'Sidang Skripsi')->orderBy('tanggal', 'DESC')->get();

        // tampilkan data tersebut ke halaman index data sidang
        return view('pages.sidang-skripsi.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ambil semua data mahasiswa
        $items = Mahasiswa::join('ujians AS ujian', 'ujian.npm', '=', 'mahasiswas.npm')->where('ujian.jenis', 'Seminar Hasil')->get();

        // tampilkan ke halaman create sidang
        return view('pages.sidang-skripsi.create', [
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // membuat validasi
        $request->validate([
            'npm' => ['required', 'string', 'max:9', 'min:9'],
            'tanggal' => ['required', 'date'],
            'jam' => ['required'],
            'ruang' => ['required', 'string', 'max:60'],
        ]);

        // membuat perkondisian apabila data mahasiswa tersebut sudah ada
        $check = Ujian::where('jenis', 'Seminar Hasil')->where('npm', $request->npm)->first();
        $check2 = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();
        $check3 = Ujian::where('jenis', 'Sidang Skripsi')->where('npm', $request->npm)->first();

        if ($check === NULL || $check2 === NULL || $check3 !== NULL) {
            return redirect()->back()->withInput();
        }else {
            // tambahkan semua data ke model
            Ujian::create([
                'npm' => $request->npm,
                'jenis' => 'Sidang Skripsi',
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }

        // kembalikan ke halaman index sidang skripsi
        return redirect()->route('sidang-skripsi.index')->with('success', 'Berhasil Menambah Sidang Skripsi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SidangSkripsi  $sidangSkripsi
     * @return \Illuminate\Http\Response
     */
    public function show(SidangSkripsi $sidangSkripsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SidangSkripsi  $sidangSkripsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ambil data sidang skripsi berdasarkan id
        $item = Ujian::findOrFail($id);

        // ambil semua data mahasiswa
        $mahasiswa = Mahasiswa::join('ujians AS ujian', 'ujian.npm', '=', 'mahasiswas.npm')->where('ujian.jenis', 'Seminar Hasil')->get();

        // tampilkan data seminar proposal ke halaman edit seminar hasil
        return view('pages.sidang-skripsi.edit', [
            'item' => $item, 'mahasiswas' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SidangSkripsi  $sidangSkripsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ambil data sidang skripsi berdasarkan id
        $item = Ujian::findOrFail($id);

        // membuat validasi
        $request->validate([
            'npm' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'jam' => ['required'],
            'ruang' => ['required', 'string', 'max:255'],
        ]);

        // membuat perkondisian apabila data mahasiswa tersebut sudah ada
        $check = Ujian::where('jenis', 'Seminar Hasil')->where('npm', $request->npm)->first();
        $check2 = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();
        $check3 = Ujian::where('jenis', 'Sidang Skripsi')->where('npm', $request->npm)->first();

        if ($item->npm === $request->npm) {
            // update masing-masing data sidang skripsi
            $item->update([
                'npm' => $request->npm,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
                'nilai' => $request->nilai,
            ]);
        }elseif ($check === NULL || $check2 === NULL || $check3 !== NULL) {
            return redirect()->back()->withInput();
        }else {
            // update masing-masing data sidang skripsi
            $item->update([
                'npm' => $request->npm,
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
                'nilai' => $request->nilai,
            ]);
        }

        // kembalikan ke halaman index sidang skripsi
        return redirect()->route('sidang-skripsi.index')->with('success', 'Berhasil Mengubah Sidang Skripsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SidangSkripsi  $sidangSkripsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ambil data sidang skripsi berdasarkan id
        $item = Ujian::findOrFail($id);

        // lakukan hapus data
        $item->delete();

        // kembalikan ke halaman index data sidang skripsi
        return redirect()->route('sidang-skripsi.index')->with('success', 'Berhasil Menghapus Sidang Skripsi');
    }
}
