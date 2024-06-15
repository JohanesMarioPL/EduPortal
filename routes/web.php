<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
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
    Route::get('/admin/program-studi', [ProdiController::class, 'getProdi'])->name('admin-prodi');
    Route::post('/admin/program-studi', [ProdiController::class, 'store'])->name('admin.prodi.store');
    Route::put('/admin/program-studi/{id}', [ProdiController::class, 'update'])->name('admin.prodi.update');
    Route::delete('/admin/program-studi/{id}', [ProdiController::class, 'destroy'])->name('admin.prodi.destroy');

    // Admin - Beasiswa
    Route::get('/admin/beasiswa', [BeasiswaController::class, 'getBeasiswa'])->name('admin-beasiswa');
    Route::post('/admin/beasiswa', [BeasiswaController::class, 'store'])->name('admin.beasiswa.store');
    Route::put('/admin/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('admin.beasiswa.update');
    Route::delete('/admin/beasiswa/{id}', [BeasiswaController::class, 'destroy'])->name('admin.beasiswa.destroy');

    // Fakultas
    Route::get('/fakultas', [LoginController::class, 'indexFakultas'])->name('fakultas.users.index');

    // Program Studi
    Route::get('/program-studi', [LoginController::class, 'indexProdi']);

    // User

});

Route::get('/user', [LoginController::class, 'indexUser']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
