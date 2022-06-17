<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data dosen
        $items = Dosen::orderBy('program_studi', 'ASC')->get();

        // tampilkan data dosen ke halaman index data mahasiswa
        return view('pages.data-dosen.index', [
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
        // tampilkan halaman tambah data dosen
        return view('pages.data-dosen.create');
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
            'nip' => ['required', 'string', 'max:18', 'unique:dosens'],
            'nama' => ['required', 'string', 'max:100'],
            'program_studi' => ['required', 'string', 'max:50'],
        ]);

        // memasukkan data mahasiswa ke model dosen
        Dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'program_studi' => $request->program_studi,
        ]);

        // kembalikan ke halaman index data dosen
        return redirect()->route('data-dosen.index')->with('success', 'Berhasil Menambah Data Dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit($nip)
    {
        // ambil data dosen berdasarkan nip
        $item = Dosen::where('nip', $nip)->first();

        // tampilkan data dosen berdasarkan nip tersebut ke halaman edit data dosen
        return view('pages.data-dosen.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        // ambil data mahasiswa berdasarkan nip
        $item = Dosen::where('nip', $nip)->first();

        // membuat validasi untuk nama dan judul
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'program_studi' => ['required', 'string', 'max:255'],
        ]);

        // membuat validasi tersendiri untuk npm
        if ($request->nip !== $item->nip) {
            $request->validate([
                'nip' => ['required', 'string', 'max:255', 'unique:mahasiswas'],
            ]);
        }

        // lakukan update data dosen satu per satu
        $item->nama = $request->nama;
        $item->program_studi = $request->program_studi;
        $item->nip = $request->nip;

        // simpan data dosen
        $item->save();

        // kembalikan ke halaman index data dosen
        return redirect()->route('data-dosen.index')->with('success', 'Berhasil Mengubah Data Dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        // ambil data dosen berdasarkan nip
        $item = Dosen::where('nip', $nip)->first();

        // lakukan proses hapus data
        $item->delete();

        // kembalikan ke halaman index data dosen
        return redirect()->route('data-dosen.index')->with('success', 'Berhasil Menghapus Data Dosen');
    }
}
