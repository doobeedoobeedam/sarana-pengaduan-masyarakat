<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

Route::get('/masuk', [AuthController::class, 'masuk'])->name('login')->middleware('guest');
Route::post('/masuk', [AuthController::class, 'login'])->middleware('guest');
Route::get('/daftar', [AuthController::class, 'daftar'])->middleware('guest');
Route::post('/daftar', [AuthController::class, 'register'])->middleware('guest');
Route::post('/keluar', [AuthController::class, 'keluar']);

// Route::get('/dashboard', function () { return view('index'); })->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/pengaduan', PengaduanController::class)->middleware('auth');
Route::put('/pengaduan/respon', [PengaduanController::class, 'response'])->middleware('auth');
Route::resource('/tanggapan', TanggapanController::class)->middleware('auth');

Route::group(['middleware' => ['auth', 'hanyaAdmin']], function() {
    Route::delete('/pengguna', [UserController::class, 'destroy']);
    Route::get('/pengguna/masyarakat', [UserController::class, 'masyarakat']);
    Route::get('/pengguna/petugas', [UserController::class, 'petugas']);
    Route::resource('/pengguna', UserController::class);
});
