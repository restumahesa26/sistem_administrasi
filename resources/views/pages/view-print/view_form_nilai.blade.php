<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Ujian Sidang Skripsi</title>
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

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000 !important;
        }

        table tr td,
        table tr th {
            font-size: 20px;
        }

        table tr th {
            padding: 2px !important;
        }

        table tr td {
            padding: 7px !important;
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
        <table class="table table-bordered mt-4">
            <tbody>
                <tr>
                    <td style="width: 35%;">Program Studi</td>
                    <td style="width: 3%;" class="text-center">:</td>
                    <td style="width: 62%;">Sistem Informasi</td>
                </tr>
                <tr>
                    <td>Jenjang</td>
                    <td class="text-center">:</td>
                    <td>S1</td>
                </tr>
                <tr>
                    <td>Hari, Tgl</td>
                    <td class="text-center">:</td>
                    <td>{{ \Carbon\Carbon::parse($data_sidang->tanggal_sidang)->translatedFormat('l, d F Y') }}</td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td class="text-center">:</td>
                    <td>{{ \Carbon\Carbon::parse($data_sidang->jam)->translatedFormat('H:i') }} WIB</td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td class="text-center">:</td>
                    <td class="text-justify">{{ $mahasiswa->judul }}</td>
                </tr>
                <tr>
                    <td>Pembimbing Utama</td>
                    <td class="text-center">:</td>
                    <td>{{ $mahasiswa->dosen_pembimbing_1->nama }}</td>
                </tr>
                <tr>
                    <td>Pembimbing Pendamping</td>
                    <td class="text-center">:</td>
                    <td>{{ $mahasiswa->dosen_pembimbing_2->nama }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered mt-3">
            <thead>
                <tr class="align-items-center text-center">
                    <th style="width: 5%; text-align: center; vertical-align: middle;">No.</th>
                    <th style="text-align: center; vertical-align: middle;">Komponen Penilaian</th>
                    <th style="width: 11%;">Bobot <br> (B)</th>
                    <th style="width: 11%;">Nilai <br> (N)</th>
                    <th style="width: 15%; text-align: center; vertical-align: middle;">B x N</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>
                        Laporan <br>
                        <ul style="list-style-type: lower-alpha;">
                            <li>Orisinalitas masalah</li>
                            <li>Keterkaitan antara judul, masalah, tujuan, metodologi, hasil dan pembahasan, serta
                                kesimpulan dan saran.</li>
                            <li>Kesesuaian dengan format Skripsi</li>
                        </ul>
                    </td>
                    <td>
                        <br>
                        <ul style="list-style-type: none; padding-left: 0px !important;" class="text-center">
                            <li>10%</li>
                            <li>10%</li>
                            <li>&nbsp;</li>
                            <li>10%</li>
                        </ul>
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>
                        Penyajian materi Skripsi <br>
                        <ul style="list-style-type: lower-alpha;">
                            <li>Presentasi</li>
                            <li>Penguasaan materi Skripsi</li>
                        </ul>
                    </td>
                    <td>
                        <br>
                        <ul style="list-style-type: none; padding-left: 0px !important;" class="text-center">
                            <li>10%</li>
                            <li>30%</li>
                        </ul>
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>
                        Penguasaan terhadap pengetahuan umum tentang Sistem Informasi
                    </td>
                    <td class="text-center">
                        20%
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>
                        Sikap dan Etika
                    </td>
                    <td class="text-center">
                        10%
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="font-weight-bold">
                        NILAI AKHIR = &#931; ( B x N)
                    </td>
                    <td class="text-center">

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="font-weight-bold">
                        Rata-Rata
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top: -12px;">Catatan : Nilai diisi dengan angka 0 - 100</p>
        <div class="d-flex justify-content-end mt-5" style="margin-right: 70px;">
            <div class="column">
                <p>Bengkulu, {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->translatedFormat('d F Y') }}</p>
                @if ($untuk == 'Pembimbing 1')
                    <p>Penguji 1,</p>
                    <p style="margin-top: 100px;">{{ $mahasiswa->dosen_pembimbing_1->nama }}</p>
                    <p>NIP. {{ $mahasiswa->dosen_pembimbing_1->nip }}</p>
                @elseif ($untuk == 'Pembimbing 2')
                    <p>Penguji 2,</p>
                    <p style="margin-top: 100px;">{{ $mahasiswa->dosen_pembimbing_2->nama }}</p>
                    <p>NIP. {{ $mahasiswa->dosen_pembimbing_2->nip }}</p>
                @elseif ($untuk == 'Penguji 1')
                    <p>Pembimbing 1,</p>
                    <p style="margin-top: 100px;">{{ $mahasiswa->dosen_penguji_1->nama }}</p>
                    <p>NIP. {{ $mahasiswa->dosen_penguji_1->nip }}</p>
                @elseif ($untuk == 'Penguji 2')
                    <p>Pembimbing 1,</p>
                    <p style="margin-top: 100px;">{{ $mahasiswa->dosen_penguji_2->nama }}</p>
                    <p>NIP. {{ $mahasiswa->dosen_penguji_2->nip }}</p>
                @endif

            </div>
        </div>
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
