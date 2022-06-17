<?php

namespace App\Http\Controllers;

use App\Models\DaftarHadir;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Ujian;
use Illuminate\Http\Request;

class DaftarHadirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'npm' => ['required', 'string', 'max:9', 'min:9']
        ]);

        $dosen = array();

        foreach ($request->nip as $value) {
            $dosen[] = $value;
        }

        $check = DaftarHadir::where('npm', $request->npm)->first();
        $check2 = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();

        if ($check == NULL) {
            foreach ($dosen as $value) {
                DaftarHadir::create([
                    'npm' => $request->npm,
                    'nip' => $value,
                    'seminar_proposal_id' => $check2->id
                ]);
            }
        } else {
            DaftarHadir::where('npm', $request->npm)->delete();
            foreach ($dosen as $value) {
                DaftarHadir::create([
                    'npm' => $request->npm,
                    'nip' => $value,
                    'seminar_proposal_id' => $check2->id
                ]);
            }
        }

        return redirect()->route('seminar-proposal.index')->with('success', 'Berhasil Membuat Daftar Hadir');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarHadir  $daftarHadir
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Mahasiswa::where('npm', $id)->first();
        $items2 = Dosen::all();

        $check = DaftarHadir::where('npm', $id)->first();
        $check2 = DaftarHadir::where('npm', $id)->get();

        if ($check == NULL) {
            return view('pages.daftar-hadir.create', [
                'items' => $items, 'items2' => $items2, 'items3' => NULL
            ]);
        } else {
            return view('pages.daftar-hadir.create', [
                'items' => $items, 'items2' => $items2, 'items3' => $check2
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarHadir  $daftarHadir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarHadir  $daftarHadir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarHadir  $daftarHadir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
