<?php

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/get-regency/{id_provinsi}', [BaseController::class, 'getRegency']);
Route::get('/get-district/{id_kota}', [BaseController::class, 'getDistrict']);
Route::get('/get-village/{id_kecamatan}', [BaseController::class, 'getVillage']);
Route::get('tipe-pembayaran/{id_tipe}/siswa/{id}', [BaseController::class, 'siswa'])->name('api.siswa');
