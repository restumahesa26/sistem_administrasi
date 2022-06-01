<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Acara Seminar Proposal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
            line-height: normal;
        }

        h4 {
            margin-bottom: -3px;
        }

        p, span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless tr td {
            padding: 1px !important;
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #000 !important;
        }

        table tr td, table tr th {
            font-size: 22px;
        }

        table tr th{
            padding: 2px !important;
        }

        table tr td {
            padding: 5px !important;
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
            SEMINAR PROPOSAL SKRIPSI
        </h5>
        <h5 class="text-center font-weight-bold" style="font-size: 20px; margin-top: -10px;">
            BERITA ACARA
        </h5>
        <p class="mt-4">Pada hari ini {{ \Carbon\Carbon::parse($data_sempro->tanggal_sempro)->translatedFormat('l') }} tanggal {{ \Carbon\Carbon::parse($data_sempro->tanggal_sempro)->translatedFormat('d') }} bulan {{ \Carbon\Carbon::parse($data_sempro->tanggal_sempro)->translatedFormat('F') }} tahun {{ \Carbon\Carbon::parse($data_sempro->tanggal_sempro)->translatedFormat('Y') }}, telah dilaksanakan Seminar Proposal Skripsi mahasiswa :</p>
        <table class="table table-borderless ml-4 mt-3">
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
                    <td style="width: 20%;">Dengan Penguji</td>
                    <td style="width: 1%;">:</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered mt-4">
            <thead>
                <tr class="text-center">
                    <th style="width: 8%">No.</th>
                    <th>Nama</th>
                    <th style="width: 30%">NIP</th>
                    <th style="width: 20%">Tanda Tangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $dosen->dosen->nama }}</td>
                    <td>{{ $dosen->dosen->nip }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-justify">
            <p class="mt-3">Setelah diadakan pembahasan dalam Seminar Proposal, maka Tim Penguji menyatakan bahwa yang bersangkutan
                @if ($kelayakan === 'Layak')
                LAYAK / <strike>TIDAK LAYAK</strike>
            @else
                <strike>LAYAK</strike>  / TIDAK LAYAK
            @endif  untuk dilanjutkan dalam penyusunan Skripsi</p>
        </div>
        <div class="text-justify">
            <p class="mt-4">Demikian Berita Acara Seminar Proposal ini dibuat dengan sebenarnya dan penuh rasa tanggung jawab</p>
        </div>
        <div class="d-flex justify-content-end mt-5" style="margin-right: 70px;">
            <div class="column">
                <p>Ketua Tim Penguji</p>
                <p style="margin-top: 100px;">{{ $ketua_penguji->nama }}</p>
                <p>NIP. {{ $ketua_penguji->nip }}</p>
            </div>
        </div>
    </div>
</body>
<script>
    window.print()
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>
