<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\SidangSkripsi;
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
        $items = SidangSkripsi::orderBy('tanggal_sidang', 'DESC')->get();

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
        $items = Mahasiswa::all();

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
            'npm' => ['required', 'string', 'max:255'],
            'tanggal_sidang' => ['required', 'date'],
            'jam' => ['required'],
            'ruang' => ['required', 'string', 'max:255'],
        ]);

        // membuat perkondisian apabila data mahasiswa tersebut sudah ada
        $check = SeminarHasil::where('npm', $request->npm)->first();
        $check2 = SeminarProposal::where('npm', $request->npm)->first();
        $check3 = SidangSkripsi::where('npm', $request->npm)->first();

        if ($check === NULL || $check2 === NULL || $check3 !== NULL) {
            return redirect()->back()->withInput();
        }else {
            // tambahkan semua data ke model
            SidangSkripsi::create([
                'npm' => $request->npm,
                'tanggal_sidang' => $request->tanggal_sidang,
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
        $item = SidangSkripsi::findOrFail($id);

        // ambil semua data mahasiswa
        $mahasiswa = Mahasiswa::all();

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
        $item = SidangSkripsi::findOrFail($id);

        // membuat validasi
        $request->validate([
            'npm' => ['required', 'string', 'max:255'],
            'tanggal_sidang' => ['required', 'date'],
            'jam' => ['required'],
            'ruang' => ['required', 'string', 'max:255'],
        ]);

        // membuat perkondisian apabila data mahasiswa tersebut sudah ada
        $check = SeminarHasil::where('npm', $request->npm)->first();
        $check2 = SeminarProposal::where('npm', $request->npm)->first();
        $check3 = SidangSkripsi::where('npm', $request->npm)->first();

        if ($item->npm === $request->npm) {
            // update masing-masing data sidang skripsi
            $item->update([
                'npm' => $request->npm,
                'tanggal_sidang' => $request->tanggal_sidang,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }elseif ($check === NULL || $check2 === NULL || $check3 !== NULL) {
            return redirect()->back()->withInput();
        }else {
            // update masing-masing data sidang skripsi
            $item->update([
                'npm' => $request->npm,
                'tanggal_sidang' => $request->tanggal_sidang,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
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
        $item = SidangSkripsi::findOrFail($id);

        // lakukan hapus data
        $item->delete();

        // kembalikan ke halaman index data sidang skripsi
        return redirect()->route('sidang-skripsi.index')->with('success', 'Berhasil Menghapus Sidang Skripsi');
    }
}