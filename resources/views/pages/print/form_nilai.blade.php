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