@extends('layouts.admin')

@section('title')
    <title>Laporan Seminar</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cetak Laporan Seminar Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cetak Laporan Seminar Mahasiswa</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-lg-12">
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fas fa-check"></i><b> Gagal!</b> {{ session()->get('error') }}</h6>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('laporan-sidang.print') }}" class="btn btn-primary mb-3" target="_blank">Cetak Laporan Seminar Mahasiswa</a>
                <button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#modal_laporan_bulan">
                    Cetak Laporan Per Bulan
                </button>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->npm }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->judul }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">-- Data Masih Kosong --</td>
                            </tr>
                            @endforelse
                            </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_laporan_bulan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan Per Bulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laporan-sidang-bulan.print') }}" method="get" target="_blank">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="bulan_awal">Bulan Awal</label>
                            <select name="bulan_awal" id="bulan_awal" class="form-control" required>
                                <option value="">-- Pilih Bulan --</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label for="bulan_akhir">Bulan Akhir</label>
                            <select name="bulan_akhir" id="bulan_akhir" class="form-control" required>
                                <option value="">-- Pilih Bulan --</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="jenis_laporan">Jenis Laporan</label>
                            <select name="jenis_laporan" id="jenis_laporan" class="form-control" required>
                                <option value="">-- Pilih Jenis Laporan --</option>
                                <option value="sempro">Seminar Proposal</option>
                                <option value="semhas">Seminar Hasil</option>
                                <option value="sidang">Sidang Skripsi</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Cetak Laporan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
