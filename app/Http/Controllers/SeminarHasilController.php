<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\SeminarHasil;
use App\Models\SeminarProposal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class SeminarHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data semhas urutkan berdasarkan tanggal terbaru
        $items = Ujian::where('jenis', 'Seminar Hasil')->orderBy('tanggal', 'DESC')->get();

        // tampilkan data tersebut ke halaman index data semhas
        return view('pages.seminar-hasil.index', [
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

        // tampilkan ke halaman create seminar hasil
        return view('pages.seminar-hasil.create', [
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

        if ($check !== NULL || $check2 === NULL) {
            return redirect()->back()->withInput();
        }else {
            // tambahkan semua data ke model
            Ujian::create([
                'npm' => $request->npm,
                'jenis' => 'Seminar Hasil',
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }

        // kembalikan ke halaman index seminar hasil
        return redirect()->route('seminar-hasil.index')->with('success', 'Berhasil Menambah Seminar Hasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarHasil $seminarHasil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ambil data seminar hasil berdasarkan id
        $item = Ujian::findOrFail($id);

        // ambil semua data mahasiswa
        $mahasiswa = Mahasiswa::all();

        // tampilkan data seminar proposal ke halaman edit seminar hasil
        return view('pages.seminar-hasil.edit', [
            'item' => $item, 'mahasiswas' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ambil data seminar hasil berdasarkan id
        $item = Ujian::findOrFail($id);

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

        if ($item->npm === $request->npm) {
            // update masing-masing data seminar hasil
            $item->update([
                'npm' => $request->npm,
                'tanggal_semhas' => $request->tanggal_semhas,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }elseif ($check !== NULL || $check2 === NULL) {
            return redirect()->back()->withInput();
        }else {
            // update masing-masing data seminar hasil
            $item->update([
                'npm' => $request->npm,
                'tanggal_semhas' => $request->tanggal_semhas,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }

        // kembalikan ke halaman index seminar hasil
        return redirect()->route('seminar-hasil.index')->with('success', 'Berhasil Mengubah Seminar Hasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarHasil  $seminarHasil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ambil data seminar hasil berdasarkan id
        $item = Ujian::findOrFail($id);

        // lakukan hapus data
        $item->delete();

        // kembalikan ke halaman index data seminar hasil
        return redirect()->route('seminar-hasil.index')->with('success', 'Berhasil Menghapus Seminar Hasil');
    }
}
