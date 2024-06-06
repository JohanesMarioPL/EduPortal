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
    Route::get('/admin', [LoginController::class, 'indexAdmin']);
    Route::get('/admin/user', [UserController::class, 'getUsers'])->name('admin-users');
    Route::get('/admin/fakultas', [FakultasController::class, 'getFakultas'])->name('admin-fakultas');
    Route::get('/admin/program-studi', [ProdiController::class, 'getProdi'])->name('admin-prodi');
    Route::get('/admin/beasiswa', [BeasiswaController::class, 'getBeasiswa'])->name('admin-beasiswa');

    // Fakultas
    Route::get('/fakultas', [LoginController::class, 'indexFakultas']);

    // Program Studi
    Route::get('/prodi', [LoginController::class, 'indexProdi']);

    // User

});

Route::get('/user', [LoginController::class, 'indexUser']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
