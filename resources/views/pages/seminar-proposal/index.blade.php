@extends('layouts.admin')

@section('title')
    <title>Seminar Proposal</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Seminar Proposal</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Seminar Proposal</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="col-lg-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h6><i class="fas fa-check"></i><b> Sukses!</b> {{ session()->get('success') }}</h6>
        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <a href="{{ route('seminar-proposal.create') }}" class="btn btn-primary mb-3">Tambah Seminar Proposal</a>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Tanggal Sempro</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td>{{ $item->mahasiswa->npm }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_sempro)->translatedFormat('d F Y') }}</td>
                                <td>
                                    <a href="{{ route('seminar-proposal.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('seminar-proposal.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">-- Data Masih Kosong --</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection