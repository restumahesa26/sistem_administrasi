<?php

namespace App\Http\Controllers;

use App\Models\CalonWisudawan;
use App\Models\Mahasiswa;
use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonWisudawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CalonWisudawan::all();

        return view('pages.calon_wisudawan.index', [
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
        $items = Mahasiswa::join('ujians AS ujian', 'ujian.npm', '=', 'mahasiswas.npm')->where('ujian.jenis', 'Sidang Skripsi')->get();

        return view('pages.calon_wisudawan.create', [
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
        $request->validate([
            'npm' => ['required', 'string', 'max:9', 'min:9'],
            'arsip' => ['required', 'string', 'max:50'],
            'hal_pengesahan' => ['required','mimes:pdf'],
        ]);

        $check = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();
        $check2 = Ujian::where('jenis', 'Seminar Hasil')->where('npm', $request->npm)->first();
        $check3 = Ujian::where('jenis', 'Sidang Skripsi')->where('npm', $request->npm)->first();

        if ($check != NULL && $check2 != NULL && $check3 != NULL) {
            $hal_pengesahan = $request->file('hal_pengesahan');
            $extension = $hal_pengesahan->extension();
            $fileNames = 'Halaman Pengesahan-' . $request->npm . '.' . $extension;
            Storage::putFileAs('public/hal_pengesahan', $hal_pengesahan, $fileNames);

            CalonWisudawan::create([
                'npm' => $request->npm,
                'arsip' => $request->arsip,
                'hal_pengesahan' => $fileNames,
            ]);

            return redirect()->route('calon-wisudawan.index')->with('success', 'Berhasil Menambah Data Calon Wisudawan');
        } else {
            return redirect()->back()->with('error', 'Cek Lagi Data Mahasiswa Yang Dimasukkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalonWisudawan  $calonWisudawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalonWisudawan  $calonWisudawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CalonWisudawan::findOrFail($id);
        $items = Mahasiswa::join('ujians AS ujian', 'ujian.npm', '=', 'mahasiswas.npm')->where('ujian.jenis', 'Sidang Skripsi')->get();

        return view('pages.calon_wisudawan.edit', [
            'item' => $item, 'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalonWisudawan  $calonWisudawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => ['required', 'string', 'max:9', 'min:9'],
            'arsip' => ['required', 'string', 'max:50'],
        ]);

        if ($request->hal_pengesahan) {
            $request->validate([
                'hal_pengesahan' => ['required','mimes:pdf'],
            ]);
        }

        $item = CalonWisudawan::findOrFail($id);

        $check = Ujian::where('jenis', 'Seminar Proposal')->where('npm', $request->npm)->first();
        $check2 = Ujian::where('jenis', 'Seminar Hasil')->where('npm', $request->npm)->first();
        $check3 = Ujian::where('jenis', 'Sidang Skripsi')->where('npm', $request->npm)->first();

        if ($check != NULL && $check2 != NULL && $check3 != NULL) {

            if ($request->hal_pengesahan) {
                $hal_pengesahan = $request->file('hal_pengesahan');
                $extension = $hal_pengesahan->extension();
                $fileNames = 'Halaman Pengesahan-' . $request->npm . '.' . $extension;
                Storage::putFileAs('public/hal_pengesahan', $hal_pengesahan, $fileNames);
            } else {
                $fileNames = $item->hal_pengesahan;
            }

            $item->update([
                'npm' => $request->npm,
                'arsip' => $request->arsip,
                'hal_pengesahan' => $fileNames,
            ]);

            return redirect()->route('calon-wisudawan.index')->with('success', 'Berhasil Mengubah Data Calon Wisudawan');
        } else {
            return redirect()->back()->with('error', 'Cek Lagi Data Mahasiswa Yang Dimasukkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalonWisudawan  $calonWisudawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CalonWisudawan::findOrFail($id);

        $filename = ('public/hal_pengesahan/').$item->hal_pengesahan;
        Storage::delete($filename);

        $item->delete();

        return redirect()->route('calon-wisudawan.index')->with('success', 'Berhasil Menghapus Data Calon Wisudawan');
    }
}
