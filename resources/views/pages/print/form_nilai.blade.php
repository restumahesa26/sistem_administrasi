@extends('layouts.admin')

@section('title')
    <title>Form Nilai</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Print Form Nilai Ujian Sidang Skripsi</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Print Form Nilai Ujian Sidang Skripsi</li>
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
                <form action="{{ route('form-nilai.print') }}" method="GET" target="_blank">
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
                        <label for="untuk">Untuk</label>
                        <select name="untuk" id="untuk" class="form-control" required>
                            <option value="" hidden>-- Pilih Untuk --</option>
                            <option value="Pembimbing 1">Dosen Pembimbing 1</option>
                            <option value="Pembimbing 2">Dosen Pembimbing 2</option>
                            <option value="Penguji 1">Dosen Penguji 1</option>
                            <option value="Penguji 2">Dosen Penguji 2</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cetak Form Nilai</button>
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
    </script>
@endpush
