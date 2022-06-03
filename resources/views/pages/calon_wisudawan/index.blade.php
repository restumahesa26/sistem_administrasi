@extends('layouts.admin')

@section('title')
    <title>Data Calon Wisudawan</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Calon Wisudawan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Calon Wisudawan</li>
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
                <a href="{{ route('calon-wisudawan.create') }}" class="btn btn-primary mb-3">Tambah Data Mahasiswa</a>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Arsip</th>
                                <th>Hal Pengesahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->mahasiswa->nama }}</td>
                                <td>
                                    <a href="{{ $item->arsip }}" target="_blank" class="text-primary">Link Arsip</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalHalPengesahan{{ $item->id }}" id="#modalCenter">
                                        Lihat Hal Pengesahan
                                    </button>
                                </td>
                                <td>
                                    <a href="{{ route('calon-wisudawan.edit', $item->id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('calon-wisudawan.destroy', $item->id) }}" method="POST" class="d-inline btn-hapus">
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
                                <div class="modal fade" id="modalHalPengesahan{{ $item2->id }}" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Hal Pengesahan</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <embed src="{{ asset('storage/hal_pengesahan/'. $item2->hal_pengesahan) }}" width="100%" height="550px">
                                                </embed>
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
