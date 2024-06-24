<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'indexLogin']);
Route::post('/', [LoginController::class, 'userLogin'])->name('userLogin');


Route::middleware(['CheckRoles'])->group(function () {
    // Admin

    // Admin - User
    Route::get('/admin', [LoginController::class, 'indexAdmin'])->name('admin.users.index');
    Route::get('/admin/user', [UserController::class, 'getUsers'])->name('admin-users');
    Route::post('/admin/user', [UserController::class, 'storeUser'])->name('admin.users.store');
    Route::delete('/admin/user/{nrp}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::put('/admin/user/{nrp}', [UserController::class, 'update'])->name('admin.users.update');


    // Admin - Fakultas
    Route::get('/admin/fakultas', [FakultasController::class, 'getFakultas'])->name('admin-fakultas');
    Route::post('/admin/fakultas', [FakultasController::class, 'store'])->name('admin.fakultas.store');
    Route::put('/admin/fakultas/{id}', [FakultasController::class, 'update'])->name('admin.fakultas.update');
    Route::delete('/admin/fakultas/{id}', [FakultasController::class, 'destroy'])->name('admin.fakultas.destroy');

    // Admin - Program Studi

    Route::get('/admin/program-studi', [ProgramStudiController::class, 'getProdi'])->name('admin-prodi');
    Route::post('/admin/program-studi', [ProgramStudiController::class, 'store'])->name('admin.prodi.store');
    Route::put('/admin/program-studi/{id}', [ProgramStudiController::class, 'update'])->name('admin.prodi.update');
    Route::delete('/admin/program-studi/{id}', [ProgramStudiController::class, 'destroy'])->name('admin.prodi.destroy');

    // Admin - Beasiswa
    Route::get('/admin/beasiswa', [BeasiswaController::class, 'getBeasiswa'])->name('admin-beasiswa');
    Route::post('/admin/beasiswa', [BeasiswaController::class, 'store'])->name('admin.beasiswa.store');
    Route::put('/admin/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('admin.beasiswa.update');
    Route::delete('/admin/beasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('admin.beasiswa.destroy');

    // Fakultas
    Route::get('/fakultas', [LoginController::class, 'indexFakultas'])->name('fakultas.users.index');

    // Fakultas - Periode
    Route::get('/fakultas/periode', [FakultasController::class, 'periodeFakultas'])->name('fakultas.periode');
    Route::post('/fakultas/periode', [FakultasController::class, 'storePeriode'])->name('fakultas.periode.store');
    Route::put('/fakultas/periode/{id}', [FakultasController::class, 'updatePeriode'])->name('fakultas.periode.update');
    Route::delete('/fakultas/periode/{id}', [FakultasController::class, 'destroyPeriode'])->name('fakultas.periode.destroy');

    // Fakultas - Mahasiswa
    Route::get('/fakultas/mahasiswa', [FakultasController::class, 'mahasiswaFakultas'])->name('fakultas.mahasiswa');
    Route::get('/fakultas/perperiode/{periode_id}', [FakultasController::class, 'mahasiswaFakultasPeriode'])->name('fakultas.perperiode');
    Route::put('/fakultas/perperiode/{pengajuan_id}', [FakultasController::class, 'mahasiswaFakultasPeriodeHasil'])->name('fakultas.perperiode.approval');
    Route::post('/fakultas/perperiode/updateStatus/{id}', [FakultasController::class, 'updateStatus'])->name('fakultas.periode.updateStatus');

    // Fakultas - Riwayat
    Route::get('/fakultas/riwayat', [FakultasController::class, 'riwayat'])->name('fakultas.riwayat');
    Route::get('/fakultas/riwayat/{periode_id}/status', [FakultasController::class, 'showStatusByPeriode'])->name('fakultas.riwayat.status');

    // Program Studi
    Route::get('/program-studi', [LoginController::class, 'indexProdi'])->name('program-studi.index');
    Route::get('/program-studi/pengajuan', [ProgramStudiController::class, 'pengajuan'])->name('program-studi.pengajuan');
    Route::get('/program-studi/riwayat', [ProgramStudiController::class, 'riwayat'])->name('program-studi.riwayat');
    Route::get('/program-studi/riwayat/{periode_id}/pengajuan', [ProgramStudiController::class, 'showPengajuanByPeriode'])->name('program-studi.riwayat.pengajuan');
    Route::post('/program-studi/pengajuan/{id}/approve', [ProgramStudiController::class, 'approvePengajuan'])->name('program-studi.pengajuan.approve');

    // User

});

Route::get('/user', [LoginController::class, 'indexUser'])->name('user.users.index');
Route::get('/user/pengajuan', [PengajuanController::class, 'index'])->name('user.pengajuan');
Route::post('/user/pengajuan', [PengajuanController::class, 'store'])->name('user.pengajuan.store');
Route::get('/pengajuan/{id}', [PengajuanController::class, 'show'])->name('user.pengajuan.show');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

