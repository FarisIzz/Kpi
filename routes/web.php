<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeselamatanInteligenController;
use App\Http\Controllers\PengurusanBanduanController;
use App\Http\Controllers\TahananRadikalController;


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
    return view('/login');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/KeselamatanKoreksional/index', function () {
    return view('KeselamatanKoreksional.index');
});

Route::get('/KeselamatanKoreksional/index', function () {
    return view('KeselamatanKoreksional.index');
});

Route::get('KeselamatanKoreksional/PengurusanBanduan', [PengurusanBanduanController::class, 'index']);
Route::get('KeselamatanKoreksional/TahananRadikal', [TahananRadikalController::class, 'index']);
Route::get('KeselamatanKoreksional/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index']);



