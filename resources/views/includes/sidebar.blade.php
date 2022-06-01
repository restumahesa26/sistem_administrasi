<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ url('logo-unib.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Administrasi</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <li class="nav-item @if(Route::is('data-mahasiswa.*') || Route::is('data-dosen.*') || Route::is('data-user.*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fa fa-fw fa-database"></i>
            <span>Main Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse @if(Route::is('data-mahasiswa.*') || Route::is('data-dosen.*') || Route::is('data-user.*')) show @endif" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Main Data</h6>
                <a class="collapse-item @if(Route::is('data-mahasiswa.*')) active @endif" href="{{ route('data-mahasiswa.index') }}">Data Mahasiswa</a>
                <a class="collapse-item @if(Route::is('data-dosen.*')) active @endif" href="{{ route('data-dosen.index') }}">Data Dosen</a>
                <a class="collapse-item @if(Route::is('data-user.*')) active @endif" href="{{ route('data-user.index') }}">Data User</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if(Route::is('seminar-proposal.*') || Route::is('seminar-hasil.*') || Route::is('sidang-skripsi.*') || Route::is('daftar-hadir.*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fa fa-fw fa-map"></i>
            <span>Data Seminar</span>
        </a>
        <div id="collapseBootstrap2" class="collapse @if(Route::is('seminar-proposal.*') || Route::is('seminar-hasil.*') || Route::is('sidang-skripsi.*') || Route::is('daftar-hadir.*')) show @endif" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data Seminar</h6>
                <a class="collapse-item @if(Route::is('seminar-proposal.*') || Route::is('daftar-hadir.*')) active @endif" href="{{ route('seminar-proposal.index') }}">Seminar Proposal</a>
                <a class="collapse-item @if(Route::is('seminar-hasil.*')) active @endif" href="{{ route('seminar-hasil.index') }}">Seminar Hasil</a>
                <a class="collapse-item @if(Route::is('sidang-skripsi.*')) active @endif" href="{{ route('sidang-skripsi.index') }}">Sidang Skripsi</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if(Route::is('berita-acara-sempro.*') || Route::is('berita-acara-semhas.*') || Route::is('berita-acara-sidang-skripsi.*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fa fa-fw fa-map"></i>
            <span>Print Berita Acara</span>
        </a>
        <div id="collapseBootstrap3" class="collapse @if(Route::is('berita-acara-sempro.*') || Route::is('berita-acara-semhas.*') || Route::is('berita-acara-sidang-skripsi.*')) show @endif" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Print Berita Acara</h6>
                <a class="collapse-item @if(Route::is('berita-acara-sempro.*')) active @endif" href="{{ route('berita-acara-sempro.view') }}">Seminar Proposal</a>
                <a class="collapse-item @if(Route::is('berita-acara-semhas.*')) active @endif" href="{{ route('berita-acara-semhas.view') }}">Seminar Hasil</a>
                <a class="collapse-item @if(Route::is('berita-acara-sidang-skripsi.*')) active @endif" href="{{ route('berita-acara-sidang-skripsi.view') }}">Sidang Skripsi</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if(Route::is('daftar-hadir-seminar-hasil-mahasiswa.*') || Route::is('daftar-hadir-seminar-hasil-dosen.*')) active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fa fa-fw fa-map"></i>
            <span>Print Daftar Hadir</span>
        </a>
        <div id="collapseBootstrap4" class="collapse @if(Route::is('daftar-hadir-seminar-hasil-mahasiswa.*') || Route::is('daftar-hadir-seminar-hasil-dosen.*')) show @endif" aria-labelledby="headingBootstrap"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Print Daftar Hadir</h6>
                <a class="collapse-item @if(Route::is('daftar-hadir-seminar-hasil-mahasiswa.*')) active @endif" href="{{ route('daftar-hadir-seminar-hasil-mahasiswa.view') }}">Mahasiswa</a>
                <a class="collapse-item @if(Route::is('daftar-hadir-seminar-hasil-dosen.*')) active @endif" href="{{ route('daftar-hadir-seminar-hasil-dosen.view') }}">Dosen</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if(Route::is('undangan.*')) active @endif">
        <a class="nav-link" href="{{ route('undangan.view') }}">
            <i class="fa fa-fw fa-map"></i>
            <span>Print Undangan</span></a>
    </li>
    <li class="nav-item @if(Route::is('form-nilai.*')) active @endif">
        <a class="nav-link" href="{{ route('form-nilai.view') }}">
            <i class="fa fa-fw fa-map"></i>
            <span>Print Form Nilai</span></a>
    </li>
    <li class="nav-item @if(Route::is('laporan-sidang.*')) active @endif">
        <a class="nav-link" href="{{ route('laporan-sidang.view') }}">
            <i class="fa fa-fw fa-map"></i>
            <span>Print Laporan Sidang</span></a>
    </li>
    <li class="nav-item @if(Route::is('calon-wisudawan.*')) active @endif">
        <a class="nav-link" href="{{ route('calon-wisudawan.index') }}">
            <i class="fa fa-fw fa-map"></i>
            <span>Data Calon Wisudawan</span></a>
    </li>
    <hr class="sidebar-divider">
</ul>
