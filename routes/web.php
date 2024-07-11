<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddKpiController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\TahananRadikalController;
use App\Http\Controllers\PengurusanBanduanController;
use App\Http\Controllers\KeselamatanInteligenController;


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
    Route::get('/home', [UserController::class, 'index'])->name('user.dashboard');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('KeselamatanKoreksional/PengurusanBanduan', [PengurusanBanduanController::class, 'index']);
Route::get('KeselamatanKoreksional/TahananRadikal', [TahananRadikalController::class, 'index']);
Route::get('KeselamatanKoreksional/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index']);



Route::resource('AddKPI', AddKpiController::class);



Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard 
    Route::get('/admin/dashboard/index', [AdminController::class, 'index'])->name('admin.index');
    // crud Kpi
    Route::get('/admin/kpi', [AddKpiController::class, 'index'])->name('admin.kpi');  
    Route::get('/kpi/add', [AddKpiController::class, 'create'])-> name('kpi.add');
    Route::post('/admin/kpi', [AddKpiController::class, 'store'])->name('kpi.store');
    Route::get('AddKPI/{AddKPI}/edit', [AddKpiController::class, 'edit'])->name('kpi.edit');
    Route::delete('/admin/Kpi/IndexKPI/{addKpi}', [AddKpiController::class, 'destroy'])->name('kpi.destroy');
    Route::put('/admin/addKpi/update/{id}', [AddKpiController::class, 'update'])->name('addKpi.update');
});




// Admin can access
Route::get('/admin/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index'])->middleware('admin')->name('admin.KeselamatanInteligen');
Route::get('/admin/PengurusanBanduan', [PengurusanBanduanController::class, 'index'])->middleware('admin')->name('admin.PengurusanBanduan');
Route::get('/admin/TahananRadikal', [TahananRadikalController::class, 'index'])->middleware('admin')->name('admin.TahananRadikal');

//User can access
Route::get('/user/dashboard', [UserController::class, 'index'])->middleware('user')->name('user.dashboard');
Route::get('/user/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index'])->middleware('user')->name('user.KeselamatanInteligen');
Route::get('/user/PengurusanBanduan', [PengurusanBanduanController::class, 'index'])->middleware('user')->name('user.PengurusanBanduan');
Route::get('/user/TahananRadikal', [TahananRadikalController::class, 'index'])->middleware('user')->name('user.TahananRadikal');


