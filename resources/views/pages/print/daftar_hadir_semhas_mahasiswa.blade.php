@extends('layouts.admin')

@section('title')
    <title>Daftar Hadir Mahasiswa</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Print Daftar Hadir Seminar Hasil Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Print Daftar Hadir Seminar Hasil Mahasiswa</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('daftar-hadir-seminar-hasil-mahasiswa.print') }}" method="GET" target="_blank">
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
                        <label for="number">Jumlah Mahasiswa</label>
                        <input type="number" name="number" id="number" class="form-control" placeholder="Masukkan Jumlah Mahasiswa" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cetak Daftar Hadir</button>
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
