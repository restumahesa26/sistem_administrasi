<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hadir Seminar Hasil Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
        }

        h4 {
            margin-bottom: -3px;
        }

        p, span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless tr td {
            padding: 3px !important;
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #000 !important;
        }

        table tr td, table tr th {
            font-size: 20px;
        }

        table tr th{
            padding: 2px !important;
        }

        table tr td {
            padding: 20px !important;
        }
    </style>
</head>
<body>
    <div class="container" style="padding-left: 50px; padding-right: 50px;">
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <img src="{{ url('logo-unib.png') }}" alt="" srcset="" style=" width: 200px; margin-left: -200px;">
            </div>
            <div class="col-9 mt-4" style="margin-left: -200px;">
                <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
                <h4>UNIVERSITAS BENGKULU</h4>
                <h4>FAKULTAS TEKNIK</h4>
                <h4 class="font-weight-bold">PROGRAM STUDI SISTEM INFORMASI</h4>
                <p style=" margin-top: 2px; font-size: 20px;">Jalan Wr. Supratman Kandang Limun Bengkulu</p>
                <p style="font-size: 20px;">Bengkulu 38371 A Telepon : (0736) 344087, 22105 - 227</p>
            </div>
        </div>
        <hr style="border: 2px solid #000; margin-top: -6px;">
        <h5 class="text-center font-weight-bold" style="text-decoration: underline; font-size: 24px;">
            SEMINAR HASIL SKRIPSI
        </h5>
        <h5 class="text-center font-weight-bold" style="font-size: 20px; margin-top: -10px;">
            DAFTAR HADIR DOSEN
        </h5>
        <p class="mt-4">Pada hari ini {{ \Carbon\Carbon::parse($data_semhas->tanggal_semhas)->translatedFormat('l') }} tanggal {{ \Carbon\Carbon::parse($data_semhas->tanggal_semhas)->translatedFormat('d') }} bulan {{ \Carbon\Carbon::parse($data_semhas->tanggal_semhas)->translatedFormat('F') }} tahun {{ \Carbon\Carbon::parse($data_semhas->tanggal_semhas)->translatedFormat('Y') }} pukul {{ \Carbon\Carbon::parse($data_semhas->jam)->translatedFormat('H.i') }} WIB, telah dilaksanakan Seminar Hasil Proposal Skripsi mahasiswa :</p>
        <table class="table table-borderless mt-3">
            <tbody>
                <tr>
                    <td style="width: 20%;">Nama</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ $mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <td style="width: 20%;">NPM</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ $mahasiswa->npm }}</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Program Studi</td>
                    <td style="width: 1%;">:</td>
                    <td>Sistem Informasi</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Judul</td>
                    <td style="width: 1%;">:</td>
                    <td class="text-justify">{{ $mahasiswa->judul }}</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Hari, Tanggal</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ \Carbon\Carbon::parse($data_semhas->tanggal)->translatedFormat('l, d F Y') }}</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Ruang</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ $mahasiswa->ruang }}</td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <table class="table table-bordered mt-2">
                <thead>
                    <tr class="text-center">
                        <th style="width:5%">No.</th>
                        <th style="width:30%">NIP</th>
                        <th style="width:40%">Nama</th>
                        <th style="width:20%">Tanda Tangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1.</td>
                        <td>{{ $mahasiswa->dosen_pembimbing_1->nip }}</td>
                        <td>{{ $mahasiswa->dosen_pembimbing_1->nama }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">2.</td>
                        <td>{{ $mahasiswa->dosen_pembimbing_2->nip }}</td>
                        <td>{{ $mahasiswa->dosen_pembimbing_2->nama }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">3.</td>
                        <td>{{ $mahasiswa->dosen_penguji_1->nip }}</td>
                        <td>{{ $mahasiswa->dosen_penguji_1->nama }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-center">4.</td>
                        <td>{{ $mahasiswa->dosen_penguji_2->nip }}</td>
                        <td>{{ $mahasiswa->dosen_penguji_2->nama }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    window.print()
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>
