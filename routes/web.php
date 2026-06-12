<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\TesKemampuanController;
use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OkupasiController;
use App\Http\Controllers\ScreeningAdminController;
use App\Http\Controllers\AreaFungsiController;
use App\Http\Controllers\ClusterSkillController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// LOGIN
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');

// PROSES LOGIN & REGISTER
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/forgot-password', [LoginController::class, 'showForgotPassword'])
    ->name('forgot.password');

Route::post('/forgot-password', [LoginController::class, 'checkEmail'])
    ->name('forgot.password.check');

Route::post('/reset-password', [LoginController::class, 'resetPassword'])
    ->name('reset.password');
/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard-mahasiswa',
        [DashboardMahasiswaController::class, 'mahasiswa']
    )->name('dashboard.mahasiswa');

    Route::get(
        '/dashboard-admin',
        [AdminDashboardController::class, 'index']
    )->name('dashboard.admin');


    /*
    |--------------------------------------------------------------------------
    | SCREENING USER
    |--------------------------------------------------------------------------
    */

    Route::get('/screening', [ScreeningController::class, 'index'])->name('screening.index');
    Route::post('/screening/get-cluster', [ScreeningController::class, 'getCluster']);
    Route::post('/screening/soal', [ScreeningController::class, 'soal'])->name('screening.soal');
    Route::post('/screening/submit', [ScreeningController::class, 'submit'])->name('screening.submit');

    /*
    |--------------------------------------------------------------------------
    | TES KEMAMPUAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/tes-kemampuan/soal',
        [TesKemampuanController::class, 'soal']
    )->name('tes.kemampuan.soal');
    Route::post(
        '/tes-kemampuan/submit',
        [TesKemampuanController::class, 'submit']
    )->name('tes.kemampuan.submit');


    /*
    |--------------------------------------------------------------------------
    | PENGGUNA
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/pengguna',
        [PenggunaController::class, 'index']
    )->name('pengguna.index');
    Route::get('/pengguna/{id}', [PenggunaController::class, 'show'])
        ->name('pengguna.show');


    /*
    |--------------------------------------------------------------------------
    | SCREENING ADMIN
    |--------------------------------------------------------------------------
    */

    Route::prefix('screening-admin')->group(function () {

        Route::get(
            '/',
            [ScreeningAdminController::class, 'index']
        )->name('screening.admin.index');

        Route::get(
            '/create',
            [ScreeningAdminController::class, 'create']
        )->name('screening.create');

        Route::post(
            '/store',
            [ScreeningAdminController::class, 'store']
        )->name('screening.store');

        Route::get(
            '/edit/{id}',
            [ScreeningAdminController::class, 'edit']
        )->name('screening.edit');

        Route::put(
            '/update/{id}',
            [ScreeningAdminController::class, 'update']
        )->name('screening.update');

        Route::delete(
            '/delete/{id}',
            [ScreeningAdminController::class, 'destroy']
        )->name('screening.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    | OKUPASI
    |--------------------------------------------------------------------------
    */

    Route::prefix('okupasi')->group(function () {

        Route::get(
            '/',
            [OkupasiController::class, 'index']
        )->name('okupasi.index');

        Route::get(
            '/create',
            [OkupasiController::class, 'create']
        )->name('okupasi.create');

        Route::post(
            '/store',
            [OkupasiController::class, 'store']
        )->name('okupasi.store');

        Route::get(
            '/edit/{id}',
            [OkupasiController::class, 'edit']
        )->name('okupasi.edit');

        Route::put(
            '/update/{id}',
            [OkupasiController::class, 'update']
        )->name('okupasi.update');

        Route::delete(
            '/delete/{id}',
            [OkupasiController::class, 'destroy']
        )->name('okupasi.destroy');
        Route::get('/okupasi/{id}', [OkupasiController::class, 'show'])
            ->name('okupasi.show');
    });


    /*
    |--------------------------------------------------------------------------
    | AREA FUNGSI
    |--------------------------------------------------------------------------
    */

    Route::prefix('area-fungsi')->group(function () {

        Route::get(
            '/',
            [AreaFungsiController::class, 'index']
        )->name('area-fungsi.index');

        Route::get(
            '/create',
            [AreaFungsiController::class, 'create']
        )->name('area-fungsi.create');

        Route::post(
            '/store',
            [AreaFungsiController::class, 'store']
        )->name('area-fungsi.store');

        Route::get(
            '/edit/{id}',
            [AreaFungsiController::class, 'edit']
        )->name('area-fungsi.edit');

        Route::put(
            '/update/{id}',
            [AreaFungsiController::class, 'update']
        )->name('area-fungsi.update');

        Route::delete(
            '/delete/{id}',
            [AreaFungsiController::class, 'destroy']
        )->name('area-fungsi.destroy');
        Route::get(
            '/area-fungsi/{id}',
            [AreaFungsiController::class, 'show']
        )->name('area-fungsi.show');
    });


    /*
    |--------------------------------------------------------------------------
    | CLUSTER SKILL
    |--------------------------------------------------------------------------
    */

    Route::prefix('cluster-skill')->group(function () {

        Route::get('/', [ClusterSkillController::class, 'index'])
            ->name('cluster-skill.index');

        Route::get('/create', [ClusterSkillController::class, 'create'])
            ->name('cluster-skill.create');

        Route::post('/store', [ClusterSkillController::class, 'store'])
            ->name('cluster-skill.store');

        Route::get('/edit/{id}', [ClusterSkillController::class, 'edit'])
            ->name('cluster-skill.edit');

        Route::put('/update/{id}', [ClusterSkillController::class, 'update'])
            ->name('cluster-skill.update');

        Route::delete('/delete/{id}', [ClusterSkillController::class, 'destroy'])
            ->name('cluster-skill.destroy');

        Route::resource('cluster-skill', ClusterSkillController::class);
    });
    /*
|--------------------------------------------------------------------------
| AJAX KOMPETENSI
|--------------------------------------------------------------------------
*/

    Route::post(
        '/kompetensi/ajax-store',
        [KompetensiController::class, 'ajaxStore']
    )->name('kompetensi.ajax.store');
});
