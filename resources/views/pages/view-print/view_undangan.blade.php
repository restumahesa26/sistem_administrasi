<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Sidang Ujian Skripsi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Times New Roman';
            line-height: normal;
        }

        h4 {
            margin-bottom: -3px;
        }

        p,
        span {
            margin-bottom: -3px;
            font-size: 22px;
        }

        .table-borderless .table-top tr td {
            padding: 0px !important;
        }

        .table-borderless .table-yth tr td {
            padding: 0px !important;
        }

        .table-borderless .table-ctt tr td {
            padding: 0px !important;
            font-size: 18px;
        }

        .table-borderless tr td {
            padding: 3px !important;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000 !important;
        }

        table tr td,
        table tr th {
            font-size: 22px;
        }

        table tr th {
            padding: 2px !important;
        }

        table tr td {
            padding: 18px !important;
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
        <table class="table table-borderless">
            <tbody class="table-top">
                <tr>
                    <td style="width: 5%;">No</td>
                    <td style="width: 2%;">:</td>
                    <td>{{ $nomor_surat }}</td>
                    <td style="width: 18%;">{{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="width: 5%;">Hal</td>
                    <td style="width: 2%;">:</td>
                    <td>Undangan Sidang Ujian Skripsi</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-borderless mt-5">
            <tbody class="table-yth">
                <tr>
                    <td style="width: 12%;">Kepada Yth</td>
                    <td style="width: 3%;"></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Bapak / Ibu</td>
                    <td>:</td>
                    <td>
                        <ol style="padding-left: 9px !important;">
                            <li>{{ $mahasiswa->dosen_pembimbing_1->nama }} (Pembimbing Utama)</li>
                            <li>{{ $mahasiswa->dosen_pembimbing_2->nama }} (Pembimbing Pendamping)</li>
                            <li>{{ $mahasiswa->dosen_penguji_1->nama }} (Penguji Utama)</li>
                            <li>{{ $mahasiswa->dosen_penguji_2->nama }} (Penguji Pendamping)</li>
                        </ol>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>di</p>
        <p>&emsp;Tempat</p>
        <p class="mt-4">Sehubungan dengan akan dilaksanakannya Sidang Ujian Skripsi mahasiswa atas nama</p>
        <table class="table table-borderless ml-5 mt-3">
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
                    <td style="width: 20%;">Judul</td>
                    <td style="width: 1%;">:</td>
                    <td class="text-justify">{{ $mahasiswa->judul }}</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-4">Kami mengharapkan kehadiran Bapak/Ibu untuk menghadiri proses Ujian Skripsi mahasiswa tersebut
            sebagai penguji pada :</p>
        <table class="table table-borderless ml-5 mt-3">
            <tbody>
                <tr>
                    <td style="width: 20%;">Hari, Tanggal</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ \Carbon\Carbon::parse($data_sidang->tanggal)->translatedFormat('l, d F Y') }}</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Pukul</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ \Carbon\Carbon::parse($data_sidang->jam)->translatedFormat('H:i') }} WIB</td>
                </tr>
                <tr>
                    <td style="width: 20%;">Tempat</td>
                    <td style="width: 1%;">:</td>
                    <td>{{ $data_sidang->ruang }}</td>
                </tr>
            </tbody>
        </table>
        <p class="mt-4">Kehadiran Bapak/Ibu tepat waktu sangat kami harapkan. Atas perhatian Bapak/Ibu diucapkan teima
            kasih.</p>
        <div class="d-flex justify-content-end mt-5" style="margin-right: 70px;">
            <div class="column">
                <p>Koordinator,</p>
                <p style="margin-top: 100px;">Aan Erlansari, S.T., M.Eng.</p>
                <p>NIP. 198112222008011011</p>
            </div>
        </div>
        <table class="table table-borderless mt-5">
            <tbody class="table-ctt">
                <tr>
                    <td style="width: 3%;">Ctt</td>
                    <td style="width: 1%;">:</td>
                    <td>Jika berhalangan hadir harap memberi informasi <br>secepatnya (secara tertulis)</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script>
    window.print()
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
</html>
