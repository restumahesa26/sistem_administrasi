<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\Mahasiswa;
use App\Models\SeminarProposal;
use App\Models\Ujian;
use Illuminate\Http\Request;

class SeminarProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambil semua data sempro urutkan berdasarkan tanggal terbaru
        $items = Ujian::where('jenis', 'Seminar Proposal')->orderBy('tanggal', 'DESC')->get();

        // tampilkan data tersebut ke halaman index data sempro
        return view('pages.seminar-proposal.index', [
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

        // tampilkan ke halaman create seminar proposal
        return view('pages.seminar-proposal.create', [
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
            'tanggal' => ['required', 'date'],
            'jam' => ['required'],
            'ruang' => ['required', 'string', 'max:255'],
        ]);

        // membuat perkondisian apabila data mahasiswa tersebut sudah ada
        $check = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();

        if ($check !== NULL) {
            return redirect()->back()->withInput();
        }else {
            // tambahkan semua data ke model
            Ujian::create([
                'npm' => $request->npm,
                'jenis' => 'Seminar Proposal',
                'tanggal' => $request->tanggal,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }

        // kembalikan ke halaman index seminar proposal
        return redirect()->route('seminar-proposal.index')->with('success', 'Berhasil Menambah Seminar Proposal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarProposal $seminarProposal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ambil data seminar proposal berdasarkan id
        $item = Ujian::findOrFail($id);

        // ambil semua data mahasiswa
        $mahasiswa = Mahasiswa::all();

        // tampilkan data seminar proposal ke halaman edit seminar proposal
        return view('pages.seminar-proposal.edit', [
            'item' => $item, 'mahasiswas' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // ambil data seminar proposal berdasarkan id
        $item = Ujian::findOrFail($id);

        // membuat validasi
        $request->validate([
            'npm' => ['required', 'string', 'max:255'],
            'tanggal_sempro' => ['required', 'date'],
            'jam' => ['required'],
            'ruang' => ['required', 'string', 'max:255'],
        ]);

        // membuat perkondisian apabila data mahasiswa tersebut sudah ada
        $check = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();

        if ($item->npm === $request->npm) {
            // update masing-masing data seminar proposal
            $item->update([
                'npm' => $request->npm,
                'tanggal_sempro' => $request->tanggal_sempro,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }elseif ($check !== NULL) {
            return redirect()->back()->withInput();
        }else {
            // update masing-masing data seminar proposal
            $item->update([
                'npm' => $request->npm,
                'tanggal_sempro' => $request->tanggal_sempro,
                'jam' => $request->jam,
                'ruang' => $request->ruang,
            ]);
        }

        // kembalikan ke halaman index seminar proposal
        return redirect()->route('seminar-proposal.index')->with('success', 'Berhasil Mengubah Seminar Proposal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarProposal  $seminarProposal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ambil data seminar proposal berdasarkan id
        $item = Ujian::findOrFail($id);

        // lakukan hapus data
        $item->delete();

        // kembalikan ke halaman index data seminar proposal
        return redirect()->route('seminar-proposal.index')->with('success', 'Berhasil Menghapus Seminar Proposal');
    }
}
