<?php

use App\Http\Controllers\Panitia\DashboardController;
use App\Http\Controllers\Auth\PanitiaLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panitia\PembayaranController;
use App\Http\Controllers\Panitia\PendaftaranController;
use App\Http\Controllers\Panitia\PengaturanController;
use App\Http\Controllers\Panitia\SiswaController;
use App\Http\Controllers\Panitia\TipePembayaranController;
use App\Http\Controllers\Panitia\TransaksiPembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('user.home');
Route::get('/terimakasih', [HomeController::class, 'trimakasih'])->name('trimakasih');

Route::middleware(['auth:panitia'])->prefix('panitia')->name('panitia.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
        Route::match(['get', 'post'], 'form-pendaftaran', [PengaturanController::class, 'formPendaftaran'])->name('form-pendaftaran');
        Route::match(['get', 'post'], 'form-login', [PengaturanController::class, 'formLogin'])->name('form-login');
    });

    Route::resource('siswa', SiswaController::class);

    Route::get('siswa-verified/{id}', [SiswaController::class, 'verified'])->name('siswa.verified');
    Route::get('siswa-resend-verified/{id}', [SiswaController::class, 'verified'])->name('siswa.resend-verified');

    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

    Route::get('tipe-pembayaran', [TipePembayaranController::class, 'index'])->name('tipe-pembayaran.index');
    Route::get('tipe-pembayaran/create', [TipePembayaranController::class, 'create'])->name('tipe-pembayaran.create');
    Route::post('tipe-pembayaran/store', [TipePembayaranController::class, 'store'])->name('tipe-pembayaran.store');
    Route::get('tipe-pembayaran/{id}/edit', [TipePembayaranController::class, 'edit'])->name('tipe-pembayaran.edit');
    Route::put('tipe-pembayaran/{id}/update', [TipePembayaranController::class, 'update'])->name('tipe-pembayaran.update');
    Route::delete('tipe-pembayaran/{id}/destroy', [TipePembayaranController::class, 'destroy'])->name('tipe-pembayaran.destroy');

    Route::get('transaksi-pembayaran', [TransaksiPembayaran::class, 'index'])->name('transaksi-pembayaran');
});


Route::get('panitia-login', [PanitiaLoginController::class, 'showLoginForm'])->name('panitia-login-form');
Route::post('panitia-login', [PanitiaLoginController::class, 'login'])->name('panitia-login');
Route::post('panitia-logout', [PanitiaLoginController::class, 'logout'])->name('panitia-logout');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('pendaftaran/identitas-diri/store', [PendaftaranController::class, 'storeIdentitasDiri'])->name('pendaftaran.identitas-diri.store');
});
