<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;

use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LaporanMengajarController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingPageController::class, 'index']);

Route::post('/daftar', [LandingPageController::class, 'daftar'])
    ->name('daftar');

/*
|--------------------------------------------------------------------------
| Dashboard Default (Breeze)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Redirect berdasarkan Role
|--------------------------------------------------------------------------
*/

Route::get('/redirect', function () {

    if (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    if (auth()->user()->role == 'guru') {
        return redirect('/guru/dashboard');
    }

});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('admin.dashboard');

    Route::resource('guru', GuruController::class);

    Route::resource('murid', MuridController::class);

    Route::resource('mata-pelajaran', MataPelajaranController::class);

    Route::resource('jadwal', JadwalController::class);

    Route::resource('laporan', LaporanMengajarController::class)
        ->only(['index', 'show']);
});

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/

Route::prefix('guru')
    ->middleware(['auth', 'role:guru'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'guru'])
            ->name('guru.dashboard');

        Route::get('/jadwal', [DashboardController::class, 'jadwalGuru'])
            ->name('guru.jadwal');

        Route::get('/murid', [DashboardController::class, 'muridGuru'])
            ->name('guru.murid');

    });

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';