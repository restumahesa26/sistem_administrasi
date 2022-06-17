@extends('layouts.admin')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>

<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-primary">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Mahasiswa
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $mahasiswa }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-success">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Seminar Proposal</div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $sempro }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-info">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Seminar Hasil</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-white">{{ $semhas }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-warning">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-white">Sidang Skripsi
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-white">{{ $sidang }} orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map fa-2x text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 order-1">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-primary">
                            <div class="panel-heading"><b>Grafik Seminar Proposal, Seminar Hasil dan Skripsi Bulan Ini</b></div>
                            <div class="panel-body">
                                <canvas id="canvas" height="280" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
        var Years = ['Seminar Proposal','Seminar Hasil','Sidang Skripsi'];
        var Labels = ['Seminar Proposal','Seminar Hasil','Sidang Skripsi'];
        var Prices = [{{ $semproCount }},{{ $semhasCount }}, {{ $sidangCount }}];
        $(document).ready(function(){
            var ctx = document.getElementById("canvas").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:Years,
                        datasets: [{
                            label: "Jumlah",
                            data: Prices,
                            borderWidth: 1,
                            backgroundColor : [
                            "#5FD068", "#47B5FF", "#EC9B3B"
                        ],
                    }]
                },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true,
                                    stepSize: 1
                                }
                            }]
                        }
                    }
                });
        });
        </script>
@endpush
