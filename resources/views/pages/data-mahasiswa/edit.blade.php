@extends('layouts.admin')

@section('title')
    <title>Data Mahasiswa</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('data-mahasiswa.index') }}">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Mahasiswa</li>
    </ol>
</div>

<form action="{{ route('data-mahasiswa.update', $item->npm) }}" method="POST">
    @csrf
    @method('PUT')
    @if($errors->any())
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-exclamation-triangle"></i><b> Gagal!</b> Terjadi Kesalahan</h6>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="npm">NPM</label>
                        <input type="text" name="npm" id="npm" class="form-control @error('npm') is-invalid @enderror" value="{{ old('npm', $item->npm) }}" placeholder="Masukkan NPM" required>
                        @error('npm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $item->nama) }}" placeholder="Masukkan Nama" required>
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $item->judul) }}" placeholder="Masukkan Judul" required>
                        @error('judul')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="pembimbing_1">Pembimbing 1</label>
                        <select name="pembimbing_1" id="pembimbing_1" class="form-control @error('pembimbing_1') is-invalid @enderror">
                            <option hidden value="">-- Pilih Dosen Pembimbing 1 --</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->nip }}" @if($dosen->nip === $item->pembimbing_1) selected @endif>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('pembimbing_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pembimbing_2">Pembimbing 2</label>
                        <select name="pembimbing_2" id="pembimbing_2" class="form-control @error('pembimbing_2') is-invalid @enderror">
                            <option hidden value="">-- Pilih Dosen Pembimbing 1 --</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->nip }}" @if($dosen->nip === $item->pembimbing_2) selected @endif>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('pembimbing_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penguji_1">Penguji 1</label>
                        <select name="penguji_1" id="penguji_1" class="form-control @error('penguji_1') is-invalid @enderror">
                            <option hidden value="">-- Pilih Dosen Penguji 1 --</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->nip }}" @if($dosen->nip === $item->penguji_1) selected @endif>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('penguji_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="penguji_2">Penguji 2</label>
                        <select name="penguji_2" id="penguji_2" class="form-control @error('penguji_2') is-invalid @enderror">
                            <option hidden value="">-- Pilih Dosen Penguji 2 --</option>
                            @foreach ($dosens as $dosen)
                                <option value="{{ $dosen->nip }}" @if($dosen->nip === $item->penguji_2) selected @endif>{{ $dosen->nama }}</option>
                            @endforeach
                        </select>
                        @error('penguji_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-3">Simpan Perubahan</button>
        </div>
    </div>
</form>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('addon-script')
    <script src="{{ url('backend/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script>
        $('#pembimbing_1').select2({
            placeholder: "-- Pilih Dosen Pembimbing 1 --",
            allowClear: true
        });
        $('#pembimbing_2').select2({
            placeholder: "-- Pilih Dosen Pembimbing 2 --",
            allowClear: true
        });
        $('#penguji_1').select2({
            placeholder: "-- Pilih Dosen Penguji 1 --",
            allowClear: true
        });
        $('#penguji_2').select2({
            placeholder: "-- Pilih Dosen Penguji 2 --",
            allowClear: true
        });
    </script>
@endpush
