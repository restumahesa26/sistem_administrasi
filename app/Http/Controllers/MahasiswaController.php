<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data mahasiswa
        $items = Mahasiswa::latest()->get();

        // tampilkan data mahasiswa ke halaman index data mahasiswa
        return view('pages.data-mahasiswa.index', [
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
        // tampilkan halaman tambah data mahasiswa
        return view('pages.data-mahasiswa.create');
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
            'npm' => ['required', 'string', 'max:255', 'unique:mahasiswas'],
            'nama' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255'],
        ]);

        // memasukkan data mahasiswa ke model mahasiswa
        $item =Mahasiswa::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'judul' => $request->judul,
        ]);

        // kembalikan ke halaman index data mahasiswa
        return redirect()->route('data-mahasiswa.index')->with('success', 'Berhasil Menambah Data Mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($npm)
    {
        // ambil data mahasiswa berdasarkan npm
        $item = Mahasiswa::where('npm', $npm)->first();

        // ambil semua data dosen
        $dosens = Dosen::all();

        // tampilkan data mahasiswa berdasarkan npm tersebut ke halaman edit data mahasiswa
        return view('pages.data-mahasiswa.edit', [
            'item' => $item, 'dosens' => $dosens
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $npm)
    {
        // ambil data mahasiswa berdasarkan npm
        $item = Mahasiswa::where('npm', $npm)->first();

        // membuat validasi untuk nama dan judul
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'judul' => ['required', 'string', 'max:255']
        ]);

        // membuat validasi tersendiri untuk npm
        if ($request->npm !== $item->npm) {
            $request->validate([
                'npm' => ['required', 'string', 'max:255', 'unique:mahasiswas'],
            ]);
        }

        // lakukan update data mahasiswa satu per satu
        $item->nama = $request->nama;
        $item->judul = $request->judul;
        $item->npm = $request->npm;
        $item->pembimbing_1 = $request->pembimbing_1;
        $item->pembimbing_2 = $request->pembimbing_2;
        $item->penguji_1 = $request->penguji_1;
        $item->penguji_2 = $request->penguji_2;

        // simpan data mahasiswa
        $item->save();

        // kembalikan ke halaman index data mahasiswa
        return redirect()->route('data-mahasiswa.index')->with('success', 'Berhasil Mengubah Data Mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($npm)
    {
        // ambil data mahasiswa berdasarkan npm
        $item = Mahasiswa::where('npm', $npm)->first();

        // lakukan proses hapus data
        $item->delete();

        // kembalikan ke halaman index data mahasiswa
        return redirect()->route('data-mahasiswa.index')->with('success', 'Berhasil Menghapus Data Mahasiswa');
    }
}
