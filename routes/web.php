<?php

use App\Http\Controllers\CalonWisudawanController;
use App\Http\Controllers\DaftarHadirController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SeminarHasilController;
use App\Http\Controllers\SeminarProposalController;
use App\Http\Controllers\SidangSkripsiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('/')
    ->middleware(['auth'])
    ->group(function() {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

        Route::resource('data-mahasiswa', MahasiswaController::class);

        Route::resource('data-dosen', DosenController::class);

        Route::resource('data-user', UserController::class);

        Route::resource('seminar-proposal', SeminarProposalController::class);

        Route::resource('daftar-hadir', DaftarHadirController::class);

        Route::resource('seminar-hasil', SeminarHasilController::class);

        Route::resource('sidang-skripsi', SidangSkripsiController::class);

        Route::resource('calon-wisudawan', CalonWisudawanController::class);

        Route::get('/berita-acara-seminar-proposal', [PrintController::class, 'view_berita_acara_sempro'])->name('berita-acara-sempro.view');

        Route::get('/berita-acara-seminar-proposal/print', [PrintController::class, 'print_berita_acara_sempro'])->name('berita-acara-sempro.print');

        Route::get('/berita-acara-seminar-hasil', [PrintController::class, 'view_berita_acara_semhas'])->name('berita-acara-semhas.view');

        Route::get('/berita-acara-seminar-hasil/print', [PrintController::class, 'print_berita_acara_semhas'])->name('berita-acara-semhas.print');

        Route::get('/berita-acara-sidang-skripsi', [PrintController::class, 'view_berita_acara_sidang_skripsi'])->name('berita-acara-sidang-skripsi.view');

        Route::get('/berita-acara-sidang-skripsi/print', [PrintController::class, 'print_berita_acara_sidang_skripsi'])->name('berita-acara-sidang-skripsi.print');

        Route::get('/daftar-hadir-seminar-hasil-dosen', [PrintController::class, 'view_daftar_hadir_seminar_hasil_dosen'])->name('daftar-hadir-seminar-hasil-dosen.view');

        Route::get('/daftar-hadir-seminar-hasil-dosen/print', [PrintController::class, 'print_daftar_hadir_seminar_hasil_dosen'])->name('daftar-hadir-seminar-hasil-dosen.print');

        Route::get('/daftar-hadir-seminar-hasil-mahasiswa', [PrintController::class, 'view_daftar_hadir_seminar_hasil_mahasiswa'])->name('daftar-hadir-seminar-hasil-mahasiswa.view');

        Route::get('/daftar-hadir-seminar-hasil-mahasiswa/print', [PrintController::class, 'print_daftar_hadir_seminar_hasil_mahasiswa'])->name('daftar-hadir-seminar-hasil-mahasiswa.print');

        Route::get('/daftar-hadir-seminar-proposal-dosen', [PrintController::class, 'view_daftar_hadir_seminar_proposal_dosen'])->name('daftar-hadir-seminar-proposal-dosen.view');

        Route::get('/daftar-hadir-seminar-proposal-dosen/print', [PrintController::class, 'print_daftar_hadir_seminar_proposal_dosen'])->name('daftar-hadir-seminar-proposal-dosen.print');

        Route::get('/daftar-hadir-seminar-proposal-mahasiswa', [PrintController::class, 'view_daftar_hadir_seminar_proposal_mahasiswa'])->name('daftar-hadir-seminar-proposal-mahasiswa.view');

        Route::get('/daftar-hadir-seminar-proposal-mahasiswa/print', [PrintController::class, 'print_daftar_hadir_seminar_proposal_mahasiswa'])->name('daftar-hadir-seminar-proposal-mahasiswa.print');

        Route::get('/undangan-ujian-sidang-skripsi', [PrintController::class, 'view_undangan'])->name('undangan.view');

        Route::get('/undangan-ujian-sidang-skripsi/print', [PrintController::class, 'print_undangan'])->name('undangan.print');

        Route::get('/form-nilai-ujian-sidang-skripsi', [PrintController::class, 'view_form_nilai'])->name('form-nilai.view');

        Route::get('/form-nilai-ujian-sidang-skripsi/print', [PrintController::class, 'print_form_nilai'])->name('form-nilai.print');

        Route::get('/laporan-sidang-mahasiswa', [PrintController::class, 'view_laporan_sidang'])->name('laporan-sidang.view');

        Route::get('/laporan-sidang-mahasiswa/print', [PrintController::class, 'print_laporan_sidang'])->name('laporan-sidang.print');

    });

require __DIR__.'/auth.php';
