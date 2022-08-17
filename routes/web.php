<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;

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

Route::get('/', function () {
    return view('index');
});

Route::resource('/petugas', UserController::class);
Route::resource('/pengaduan', PengaduanController::class);
Route::resource('/masyarakat', MasyarakatController::class);
