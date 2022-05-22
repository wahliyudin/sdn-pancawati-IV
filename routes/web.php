<?php

use App\Http\Controllers\Panitia\DashboardController;
use App\Http\Controllers\Auth\PanitiaLoginController;
use App\Http\Controllers\EncryptController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Panitia\PembayaranController;
use App\Http\Controllers\Panitia\PendaftaranController;
use App\Http\Controllers\Panitia\PengaturanController;
use App\Http\Controllers\Panitia\SiswaController;
use App\Http\Controllers\Panitia\TarifPembayaranController;
use App\Http\Controllers\Panitia\TipePembayaranController;
use App\Http\Controllers\Panitia\TransaksiPembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('user.home');
Route::get('/terimakasih', [HomeController::class, 'trimakasih'])->name('trimakasih');

Route::middleware(['auth.panitia:panitia'])->prefix('panitia')->name('panitia.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
        Route::match(['get', 'post'], 'form-pendaftaran', [PengaturanController::class, 'formPendaftaran'])->name('form-pendaftaran');
        Route::match(['get', 'post'], 'form-login', [PengaturanController::class, 'formLogin'])->name('form-login');
    });

    Route::resource('siswa', SiswaController::class);

    Route::get('siswa/verified/{id}', [SiswaController::class, 'verified'])->name('siswa.verified');
    Route::get('siswa/resend-verified/{id}', [SiswaController::class, 'verified'])->name('siswa.resend-verified');
    Route::get('siswa/resend-verified/{id}', [SiswaController::class, 'verified'])->name('siswa.resend-verified');
    Route::get('siswa/verif-berkas/{id}/{status}', [SiswaController::class, 'verifBerkas'])->name('siswa.verif-berkas');

    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');

    Route::get('tipe-pembayaran', [TipePembayaranController::class, 'index'])->name('tipe-pembayaran.index');
    Route::get('tipe-pembayaran/create', [TipePembayaranController::class, 'create'])->name('tipe-pembayaran.create');
    Route::post('tipe-pembayaran/store', [TipePembayaranController::class, 'store'])->name('tipe-pembayaran.store');
    Route::get('tipe-pembayaran/{id}/edit', [TipePembayaranController::class, 'edit'])->name('tipe-pembayaran.edit');
    Route::put('tipe-pembayaran/{id}/update', [TipePembayaranController::class, 'update'])->name('tipe-pembayaran.update');
    Route::delete('tipe-pembayaran/{id}/destroy', [TipePembayaranController::class, 'destroy'])->name('tipe-pembayaran.destroy');

    Route::get('transaksi-pembayaran', [TransaksiPembayaran::class, 'index'])->name('transaksi-pembayaran');
    Route::get('transaksi-pembayaran/create', [TransaksiPembayaran::class, 'create'])->name('transaksi-pembayaran.create');
    Route::get('transaksi-pembayaran/{id}/detail', [TransaksiPembayaran::class, 'detail'])->name('transaksi-pembayaran.detail');
    Route::post('payment', [TransaksiPembayaran::class, 'payment'])->name('payment');

    Route::get('tarif-pembayaran', [TarifPembayaranController::class, 'index'])->name('tarif-pembayaran.index');
    Route::get('tarif-pembayaran/tipe-pembayaran/{id}', [TarifPembayaranController::class, 'byTipe'])->name('tarif-pembayaran.by-tipe');
    Route::post('tarif-pembayaran/tipe-pembayaran/{id}/sama', [TarifPembayaranController::class, 'billingSame'])->name('tarif-pembayaran.by-tipe.sama');
    Route::post('tarif-pembayaran/tipe-pembayaran/{id}/per-siswa', [TarifPembayaranController::class, 'billingPerStudent'])->name('tarif-pembayaran.by-tipe.per-siswa');

    Route::get('exports/bukti-pembayaran-pertransaksi/{student_id}/{item_payment_id}', [HomeController::class,
    'exportBuktiPembayaranPertransaksi'])->name('exports.bukti-pembayaran.pertransaksi');
    Route::get('exports/bukti-pembayaran/{student_id}/{type_of_payment_id}/{name_type_of_payment}',
    [HomeController::class,
    'exportBuktiPembayaran'])->name('exports.bukti-pembayaran');
});

Route::get('panitia-login', [PanitiaLoginController::class, 'showLoginForm'])->name('panitia-login-form');
Route::post('panitia-login', [PanitiaLoginController::class, 'login'])->name('panitia-login');
Route::post('panitia-logout', [PanitiaLoginController::class, 'logout'])->name('panitia-logout');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('pendaftaran/identitas-diri/store', [PendaftaranController::class, 'storeIdentitasDiri'])->name('pendaftaran.identitas-diri.store');
    Route::post('pendaftaran/data-orang-tua/store', [PendaftaranController::class, 'storeDataOrangTua'])->name('pendaftaran.data-orang-tua.store');
    Route::post('pendaftaran/kirim', [PendaftaranController::class, 'kirim'])->name('pendaftaran.kirim');
});

Route::get('coba', [EncryptController::class, 'index'])->middleware('decrypt');
Route::get('bukti-pembayaran', function (){
    return view('exports.bukti-pembayaran');
});
