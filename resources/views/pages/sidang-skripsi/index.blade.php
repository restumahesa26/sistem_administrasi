@extends('layouts.admin')

@section('title')
    <title>Sidang Skripsi</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sidang Skripsi</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Sidang Skripsi</li>
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
                <a href="{{ route('sidang-skripsi.create') }}" class="btn btn-primary mb-3">Tambah Sidang Skripsi</a>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>NPM</th>
                                <th>Tanggal Sidang</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td>{{ $item->mahasiswa->npm }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                <td>{{ $item->nilai != NULL ? $item->nilai : '-' }}</td>
                                <td>
                                    <a href="{{ route('sidang-skripsi.edit', $item->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                                    <form action="{{ route('sidang-skripsi.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus">
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

@push('addon-style')
    <link rel="stylesheet" href="{{ url('css/sweetalert2.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>
    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Hapus Data?',
            text: "Data Akan Terhapus",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>
@endpush
