<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesKemampuanController;

// login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// logout
Route::get('/logout', [LoginController::class, 'logout']);

// LANGSUNG KE DASHBOARD (sementara tanpa login)
Route::get('/', [DashboardMahasiswaController::class, 'mahasiswa']);

// Route dashboard
Route::get('/dashboard-mahasiswa', [DashboardMahasiswaController::class, 'mahasiswa'])
    ->name('dashboard.mahasiswa');
Route::get('/tes-kemampuan', [TesKemampuanController::class, 'index'])
    ->name('tes.kemampuan');
Route::get('/tes-kemampuan/{id_area}', [TesKemampuanController::class, 'cluster'])
    ->name('tes.kemampuan.cluster');
Route::get('/tes-kemampuan/cluster/{id_cluster}', [TesKemampuanController::class, 'soal'])
    ->name('tes.kemampuan.soal'); // ✅ INI YANG KURANG
Route::post('/tes-kemampuan/submit', [TesKemampuanController::class, 'submit'])
    ->name('tes.kemampuan.submit');
