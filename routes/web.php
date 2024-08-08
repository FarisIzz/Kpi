<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AddKpiController;
use App\Http\Controllers\UserKpiController;
use App\Http\Controllers\PermissionController;


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
    return view('/auth/login');
});

// ===================== REGISTER & LOGIN ======================
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

// ===================== SUPER ADMIN ======================
Route::group(['middleware' => ['role:super admin']], function () {
    // Super admin permission 
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    // Super admin set roles 
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permission', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permission', [RoleController::class, 'updatePermissionToRole']);

    // Super admin users
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
});

// ===================== ADMIN ======================
Route::group(['middleware' => ['role:admin']], function () {
    // dashboard 
    Route::get('/admin/dashboard/index', [AdminController::class, 'index'])->name('admin.index');
    // crud Kpi
    Route::get('/admin/kpi', [AddKpiController::class, 'index'])->name('admin.kpi');  
    Route::get('/kpi/add', [AddKpiController::class, 'create'])-> name('kpi.add');
    Route::post('/admin/kpi', [AddKpiController::class, 'store'])->name('kpi.store');
    Route::get('AddKPI/{AddKPI}/edit', [AddKpiController::class, 'edit'])->name('kpi.edit');
    Route::delete('/admin/Kpi/IndexKPI/{addKpi}', [AddKpiController::class, 'destroy'])->name('kpi.destroy');
    Route::put('/admin/addKpi/update/{id}', [AddKpiController::class, 'update'])->name('kpi.update');
});

// ===================== USER ======================
// Route::group(['middleware' => ['role:user']], function () {
//     Route::put('/user/addKpi/update/{id}', [UserKpiController::class, 'update'])->name('user.update');
//     Route::get('/user/{AddKPI}/edit', [UserKpiController::class, 'edit'])->name('user.edit');
//     Route::get('/user/KPI/IndexKPI', [UserKpiController::class, 'inputForm'])->name('user.kpi.input');
//     Route::post('/user/KPI/IndexKPI', [UserKpiController::class, 'storeInput'])->name('user.kpi.storeInput');
// });

// Route::middleware(['auth', 'checkKpiOwner'])->group(function () {
//     Route::get('add_kpi/{add_kpi}', [UserKpiController::class, 'show'])->name('user.kpi.input');
//     // Tambahkan rute lain yang memerlukan pemeriksaan pemilik KPI di sini...
// });

Route::middleware(['role:user'])->group(function () {
    Route::put('/user/addKpi/update/{id}', [UserKpiController::class, 'update'])->name('user.update');
    Route::get('/user/{AddKPI}/edit', [UserKpiController::class, 'edit'])->name('user.edit');
    // Route::get('/user/KPI/IndexKPI', [UserKpiController::class, 'inputForm'])->name('user.kpi.input');
    Route::post('/user/KPI/IndexKPI', [UserKpiController::class, 'storeInput'])->name('user.kpi.storeInput');
    Route::get('/user/KPI/IndexKPI', [UserKpiController::class, 'index'])->name('user.kpi.input');
});

// Route::middleware(['auth'])->group(function () {
//     Route::middleware(['role:user'])->group(function () {
//         Route::put('/user/addKpi/update/{id}', [UserKpiController::class, 'update'])->name('user.update');
//         Route::get('/user/{AddKPI}/edit', [UserKpiController::class, 'edit'])->name('user.edit');
//         // Route::get('/user/KPI/IndexKPI', [UserKpiController::class, 'inputForm'])->name('user.kpi.input');
//         Route::post('/user/KPI/IndexKPI', [UserKpiController::class, 'storeInput'])->name('user.kpi.storeInput');
//         Route::get('/userdashboard', [UserKpiController::class, 'index'])->name('user.kpi.input');
//     });

//     // Route::middleware(['checkKpiOwner'])->group(function () {
//     //     Route::get('add_kpi/{add_kpi}', [UserKpiController::class, 'show']);
//     // });
// });


// ===================== LOGOUT ======================
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('KeselamatanKoreksional/PengurusanBanduan', [PengurusanBanduanController::class, 'index']);
// Route::get('KeselamatanKoreksional/TahananRadikal', [TahananRadikalController::class, 'index']);
// Route::get('KeselamatanKoreksional/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index']);

// Admin can access
// Route::get('/admin/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index'])->middleware('admin')->name('admin.KeselamatanInteligen');
// Route::get('/admin/PengurusanBanduan', [PengurusanBanduanController::class, 'index'])->middleware('admin')->name('admin.PengurusanBanduan');
// Route::get('/admin/TahananRadikal', [TahananRadikalController::class, 'index'])->middleware('admin')->name('admin.TahananRadikal');

// //User can access
// Route::get('/user/dashboard', [InstitutionController::class, 'index'])->middleware('user')->name('user.dashboard');
// Route::get('/user/KeselamatanInteligen', [KeselamatanInteligenController::class, 'index'])->middleware('user')->name('user.KeselamatanInteligen');
// Route::get('/user/PengurusanBanduan', [PengurusanBanduanController::class, 'index'])->middleware('user')->name('user.PengurusanBanduan');
// Route::get('/user/TahananRadikal', [TahananRadikalController::class, 'index'])->middleware('user')->name('user.TahananRadikal');


