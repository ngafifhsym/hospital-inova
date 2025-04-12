<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TindakanController;
use App\Models\Kunjungan;
use App\Models\Pembayaran;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['role:admin,petugas'])->group(function () {
});
Route::resource('/pendaftaranPasien', PasienController::class);
Route::resource('/kunjungan', KunjunganController::class);

Route::middleware(['role:admin,dokter'])->group(function () {
    Route::resource('/tindakan', TindakanController::class);
    Route::resource('/obat', ObatController::class);
});
Route::resource('/pembayaran', PembayaranController::class);


Route::resource('/pegawai', PegawaiController::class)->middleware('admin');

