@extends('layouts.admin')

@section('title')
    <title>Laporan Seminar</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Print Laporan Seminar Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Print Laporan Seminar Mahasiswa</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('laporan-sidang.print') }}" class="btn btn-primary mb-3" target="_blank">Print Laporan Seminar Mahasiswa</a>
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
@endsection
