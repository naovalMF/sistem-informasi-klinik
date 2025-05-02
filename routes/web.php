<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KunjunganController;

Route::get('/', fn () => view('welcome'));

// Dashboard utama (hanya user terverifikasi)
Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

// Semua route di bawah ini hanya untuk user login
Route::middleware(['auth'])->group(function () {

    // Dashboard per role
    Route::middleware('role:admin')->get('/dashboard/admin', fn () => view('dashboard.admin'))->name('dashboard.admin');
    Route::middleware('role:dokter')->get('/dashboard/dokter', fn () => view('dashboard.dokter'))->name('dashboard.dokter');
    Route::middleware('role:kasir')->get('/dashboard/kasir', fn () => view('dashboard.kasir'))->name('dashboard.kasir');
    Route::middleware('role:pendaftar')->get('/dashboard/pendaftar', fn () => view('dashboard.pendaftar'))->name('dashboard.pendaftar');

    // Profil pengguna (semua bisa)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD - Admin Only
    Route::middleware('role:admin')->group(function () {
        Route::resource('wilayah', WilayahController::class);
        Route::resource('obat', ObatController::class);
        Route::resource('tindakan', TindakanController::class);
        Route::resource('pegawai', PegawaiController::class);
        Route::resource('pasien', PasienController::class);
    });

    // Pendaftaran - Dokter
    Route::middleware('role:dokter')->group(function () {
        Route::resource('pendaftaran', PendaftaranController::class);
    });

    // Pembayaran - Kasir
    Route::middleware('role:kasir')->group(function () {
        Route::resource('pembayaran', PembayaranController::class);
    });

    // Laporan & Kunjungan - Admin & Kasir
    Route::middleware('role:admin,kasir')->group(function () {
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/kunjungan', [LaporanController::class, 'kunjungan'])->name('laporan.kunjungan');
        Route::get('/laporan/pembayaran', [LaporanController::class, 'pembayaran'])->name('laporan.pembayaran');
        Route::get('/laporan/kunjungan/pdf', [LaporanController::class, 'cetakKunjungan'])->name('laporan.kunjungan.pdf');
        Route::get('/laporan/pembayaran/pdf', [LaporanController::class, 'cetakPembayaran'])->name('laporan.pembayaran.pdf');

        Route::get('/kunjungan/create', [KunjunganController::class, 'create'])->name('kunjungan.create');
        Route::post('/kunjungan/store', [KunjunganController::class, 'store'])->name('kunjungan.store');

        Route::get('/pembayaran/create/{kunjungan_id}', [PembayaranController::class, 'create'])->name('pembayaran.create');
        Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
    });
});

// Auth routes
require __DIR__.'/auth.php';
