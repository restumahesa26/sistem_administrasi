@extends('layouts.admin')

@section('title')
    <title>Berita Acara Seminar Hasil</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Print Berita Acara Seminar Hasil</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Print Berita Acara Seminar Hasil</li>
    </ol>
</div>

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h6><i class="fas fa-check"></i><b> Gagal!</b> {{ session()->get('error') }}</h6>
    </div>
@endif
<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('berita-acara-semhas.print') }}" method="GET" target="_blank">
                    <div class="form-group">
                        <label for="npm">Mahasiswa</label>
                        <select name="npm" id="npm" class="form-control select2-mahasiswa" required>
                            <option value="" hidden>-- Pilih Mahasiswa --</option>
                            @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->npm }}">{{ $mahasiswa->nama }} - {{ $mahasiswa->npm }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nip_koordinator">Koordinator</label>
                        <select name="nip_koordinator" id="nip_koordinator" class="form-control select2-koordinator" required>
                            <option value="" hidden>-- Pilih Koordinator --</option>
                            @foreach ($dosens as $dosen3)
                            <option value="{{ $dosen3->nip }}">{{ $dosen3->nama }} - {{ $mahasiswa->dosen3 }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nip_ketua_penguji">Ketua Tim Penguji</label>
                        <select name="nip_ketua_penguji" id="nip_ketua_penguji" class="form-control select2-ketua-penguji" required>
                            <option value="" hidden>-- Pilih Ketua Tim Penguji --</option>
                            @foreach ($dosens as $dosen2)
                            <option value="{{ $dosen2->nip }}">{{ $dosen2->nama }} - {{ $mahasiswa->dosen2 }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cetak Berita Acara</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('addon-script')
    <script src="{{ url('backend/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $('.select2-mahasiswa').select2({
            placeholder: "-- Pilih Mahasiswa --",
            allowClear: true
        });
        $('.select2-koordinator').select2({
            placeholder: "-- Pilih Koordinator --",
            allowClear: true
        });
        $('.select2-ketua-penguji').select2({
            placeholder: "-- Pilih Ketua Tim Penguji --",
            allowClear: true
        });
    </script>
@endpush
