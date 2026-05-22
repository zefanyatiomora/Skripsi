<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesKemampuanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreeningController;
/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// halaman login
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');

// proses login & register
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

// logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    //profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // dashboard
    Route::get('/dashboard-mahasiswa', [DashboardMahasiswaController::class, 'mahasiswa'])
        ->name('dashboard.mahasiswa');

    Route::get('/screening', [ScreeningController::class, 'index'])
    ->name('screening.index');
    
    Route::post('/screening/submit', [ScreeningController::class, 'submit'])
    ->name('screening.submit');

    // // tes kemampuan
    // Route::get('/tes-kemampuan', [TesKemampuanController::class, 'index'])
    //     ->name('tes.kemampuan');

    // Route::get('/tes-kemampuan/{id_area}', [TesKemampuanController::class, 'cluster'])
    //     ->name('tes.kemampuan.cluster');

    Route::get('/tes-kemampuan/cluster/{id_cluster}', [TesKemampuanController::class, 'soal'])
        ->name('tes.kemampuan.soal');

    Route::post('/tes-kemampuan/submit', [TesKemampuanController::class, 'submit'])
        ->name('tes.kemampuan.submit');

});