@extends('layouts.admin')

@section('title')
    <title>Berita Acara Sidang Skripsi</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cetak Berita Acara Siang Skripsi</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cetak Berita Acara Sidang Skripsi</li>
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
                <form action="{{ route('berita-acara-sidang-skripsi.print') }}" method="GET" target="_blank">
                    <div class="form-group">
                        <label for="npm">Nama Mahasiswa</label>
                        <select name="npm" id="npm" class="form-control select2-mahasiswa" required>
                            <option value="" hidden>-- Pilih Mahasiswa --</option>
                            @foreach ($mahasiswas as $mahasiswa)
                            <option value="{{ $mahasiswa->npm }}">{{ $mahasiswa->nama }} - {{ $mahasiswa->npm }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status Kelulusan</label>
                        <div class="custom-control custom-radio" required>
                            <input type="radio" id="customRadio3" name="status" class="custom-control-input" value="Lulus">
                            <label class="custom-control-label" for="customRadio3">Lulus</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio4" name="status" class="custom-control-input" value="Tidak Lulus">
                            <label class="custom-control-label" for="customRadio4">Tidak Lulus</label>
                        </div>
                        <div class="custom-control custom-radio" required>
                            <input type="radio" id="customRadio5" name="status" class="custom-control-input" value="Jadwal Ulang">
                            <label class="custom-control-label" for="customRadio5">Jadwal Ulang</label>
                        </div>
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
