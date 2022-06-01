<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Sidang Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        @media print{
          @page {
            size: landscape
          }
        }

        body {
            font-family: 'Times New Roman';
        }

        .table-bordered th, .table-bordered td{
            border: 1px solid #000 !important;
        }

        h4 {
            margin-bottom: -3px;
        }

        p, span {
            margin-bottom: -3px;
            font-size: 18px;
        }

        table tr td, table tr th {
            font-size: 10px;
        }

        table tr th{
            padding: 2px !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h5 class="text-center font-weight-bold" style="text-decoration: underline; font-size: 16px;">
            Laporan Data Sidang Mahasiswa
        </h5>
        <table class="table table-bordered mt-4">
          <thead>
              <tr class="text-center">
                  <th style="text-align: center; vertical-align: middle;">No.</th>
                  <th style="text-align: center; vertical-align: middle;">NPM</th>
                  <th style="text-align: center; vertical-align: middle;">Nama</th>
                  <th>Pembimbing<br>Utama</th>
                  <th>Pembimbing<br>Pendamping</th>
                  <th>Penguji<br>Utama</th>
                  <th>Penguji<br>Pendamping</th>
                  <th>Tanggal<br>Sempro</th>
                  <th>Tanggal<br>Semhas</th>
                  <th>Tanggal<br>Sidang</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($items as $item)
              <tr>
                <td class="text-center" style="width: 3%; vertical-align: middle;">{{ $loop->iteration }}.</td>
                <td style="vertical-align: middle;">{{ $item->npm }}</td>
                <td style="vertical-align: middle;">{{ $item->nama }}</td>
                <td style="vertical-align: middle;">@if ($item->dosen_pembimbing_1 == NULL)
                    -
                @else
                    {{ $item->dosen_pembimbing_1->nama }}
                @endif</td>
                <td style="vertical-align: middle;">@if ($item->dosen_pembimbing_2 == NULL)
                    -
                @else
                    {{ $item->dosen_pembimbing_2->nama }}
                @endif</td>
                <td style="vertical-align: middle;">@if ($item->dosen_penguji_1 == NULL)
                    -
                @else
                    {{ $item->dosen_penguji_1->nama }}
                @endif</td>
                <td style="vertical-align: middle;">@if ($item->dosen_penguji_2 == NULL)
                    -
                @else
                    {{ $item->dosen_penguji_2->nama }}
                @endif</td>
                <td style="width: 12%; vertical-align: middle;">@if ($item->sempro == NULL)
                    -
                @else
                    {{ \Carbon\Carbon::parse($item->sempro->tanggal)->translatedFormat('l, d F Y') }}
                @endif</td>
                <td style="width: 12%; vertical-align: middle;">@if ($item->semhas == NULL)
                    -
                @else
                    {{ \Carbon\Carbon::parse($item->semhas->tanggal)->translatedFormat('l, d F Y') }}
                @endif</td>
                <td style="width: 12%; vertical-align: middle;">@if ($item->sidang == NULL)
                    -
                @else
                    {{ \Carbon\Carbon::parse($item->sidang->tanggal)->translatedFormat('l, d F Y') }}
                @endif</td>
            </tr>
              @empty

              @endforelse

          </tbody>
      </table>
    </div>
</body>
<script>
    window.print()
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>
