@extends('layouts.admin')

@section('title')
    <title>Daftar Hadir Seminar Proposal</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Hadir Seminar Proposal</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('seminar-proposal.index') }}">Seminar Proposal</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Hadir Seminar Proposal</li>
    </ol>
</div>

<form action="{{ route('daftar-hadir.store') }}" method="POST">
    @csrf
    @if($errors->any())
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-exclamation-triangle"></i><b> Gagal!</b> Terjadi Kesalahan</h6>
        </div>
    @endif
    @if ($items3 != NULL)
    <div class="row mb-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Dosen</th>
                                    <th>NIP Dosen</th>
                                    <th>Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items3 as $item2)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item2->dosen->nama }}</td>
                                    <td>{{ $item2->dosen->nip }}</td>
                                    <td>{{ $item2->dosen->program_studi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="npm">Mahasiswa</label>
                        <input type="text" name="nama" id="nama" value="{{ $items->nama }}" class="form-control" readonly>
                        <input type="hidden" name="npm" id="npm" value="{{ $items->npm }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nip">Dosen</label>
                        <select name="nip[]" id="nip" class="form-control @error('nip') is-invalid @enderror select2-dosen" multiple="multiple">
                            <option hidden value="">-- Pilih Dosen --</option>
                            @foreach ($items2 as $item)
                                <option value="{{ $item->nip }}" @if(old('nip') == $item->nip) selected @endif>{{ $item->nama }} - {{ $item->nip }}</option>
                            @endforeach
                        </select>
                        @error('nip')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('addon-style')
    <link href="{{ url('backend/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('backend/vendor/clock-picker/clockpicker.css') }}" rel="stylesheet">
    <link href="{{ url('backend/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" >
@endpush

@push('addon-script')
    <script src="{{ url('backend/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ url('backend/vendor/clock-picker/clockpicker.js') }}"></script>
    <script src="{{ url('backend/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.select2-mahasiswa').select2({
            placeholder: "-- Pilih Mahasiswa --",
            allowClear: true
        });
        $('.select2-dosen').select2({
            placeholder: "-- Pilih Dosen --",
            allowClear: true
        });
    </script>
@endpush
