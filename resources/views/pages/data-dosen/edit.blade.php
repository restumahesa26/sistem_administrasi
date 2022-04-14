@extends('layouts.admin')

@section('title')
    <title>Data Dosen</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Dosen</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('data-dosen.index') }}">Data Dosen</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Dosen</li>
    </ol>
</div>

<form action="{{ route('data-dosen.update', $item->nip) }}" method="POST">
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
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
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip', $item->nip) }}" placeholder="Masukkan NIP" required>
                        @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="program_studi">Judul</label>
                        <input type="text" name="program_studi" id="program_studi" class="form-control @error('program_studi') is-invalid @enderror" value="{{ old('program_studi', $item->program_studi) }}" placeholder="Masukkan Judul" required>
                        @error('program_studi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
