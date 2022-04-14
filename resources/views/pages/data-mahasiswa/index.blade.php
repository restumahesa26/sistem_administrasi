@extends('layouts.admin')

@section('title')
    <title>Data Mahasiswa</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
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
                <a href="{{ route('data-mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Data Mahasiswa</a>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Nama Dosen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->npm }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    @if ($item->dosen_pembimbing_1 !== NULL)
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#namaDosen{{ $item->npm }}" id="#modalCenter">
                                            Nama Dosen
                                        </button>
                                    @else
                                        -
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('data-mahasiswa.edit', $item->npm) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('data-mahasiswa.destroy', $item->npm) }}" method="POST"
                                        class="d-inline">
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
                            @foreach ($items as $item2)
                                <div class="modal fade" id="namaDosen{{ $item2->npm }}" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Nama Dosen Pembimbing & Penguji</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mt-2">
                                                    <div class="col-md-6">Dosen Pembimbing 1</div>
                                                    <div class="col-md-6">: @if ($item2->dosen_pembimbing_1 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_pembimbing_1->nama }}
                                                    @endif</div>
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">&nbsp;@if ($item2->dosen_pembimbing_1 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_pembimbing_1->nip }}
                                                    @endif</div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">Dosen Pembimbing 2</div>
                                                    <div class="col-md-6">: @if ($item2->dosen_pembimbing_2 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_pembimbing_2->nama }}
                                                    @endif</div>
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">&nbsp;@if ($item2->dosen_pembimbing_2 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_pembimbing_2->nip }}
                                                    @endif</div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">Dosen Penguji 1</div>
                                                    <div class="col-md-6">: @if ($item2->dosen_penguji_1 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_penguji_1->nama }}
                                                    @endif</div>
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">&nbsp;@if ($item2->dosen_penguji_1 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_penguji_1->nip }}
                                                    @endif</div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">Dosen Penguji 1</div>
                                                    <div class="col-md-6">: @if ($item2->dosen_penguji_2 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_penguji_2->nama }}
                                                    @endif</div>
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">&nbsp;@if ($item2->dosen_penguji_2 === NULL)
                                                        -
                                                    @else
                                                        {{ $item2->dosen_penguji_2->nip }}
                                                    @endif</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
