<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// landing page
Route::get('/', function () {
    return view('landing');
});

Route::get('/', [LandingPageController::class, 'index']);

Route::post('/daftar',
    [LandingPageController::class, 'daftar'])->name('daftar');
// akhir landing page

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// untuk cek user yang login
// Route::get('/cek-user', function () {
//     return auth()->user();
// });


// untuk logout paksa

// Route::get('/logout-test', function () {
//     auth()->logout();
//     request()->session()->invalidate();
//     request()->session()->regenerateToken();
//     return redirect('/login');
// });

// akhir logout paksa

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/redirect', function () {

    if(auth()->user()->role == 'admin'){
        return redirect('/admin/dashboard');
    }

    if(auth()->user()->role == 'guru'){
        return redirect('/guru/dashboard');
    }

});

// bagian admin
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->middleware(['auth', 'role:admin']);

// akhir admin

// Route::get('/cek-guru', function () {

//     return \App\Models\Guru::where(
//         'user_id',
//         auth()->id()
//     )->first();

// })->middleware('auth');

// bagian guru
// Guru
Route::prefix('guru')->middleware(['auth', 'role:guru'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'guru'])->name('guru.dashboard');

        Route::get('/jadwal', [DashboardController::class, 'jadwalGuru'])->name('guru.jadwal');

        Route::get('/murid', [DashboardController::class, 'muridGuru'])->name('guru.murid');
    });
// akhir guru

// admin-guru
Route::resource('guru', GuruController::class)->middleware(['auth', 'role:admin']);
// Route::resource('admin/guru', GuruController::class)->middleware(['auth', 'role:admin']);


// bagian murid
Route::resource('murid', MuridController::class)->middleware(['auth', 'role:admin']);
// akhir murid

// mata pelajaran
Route::resource('mata-pelajaran', MataPelajaranController::class)->middleware(['auth', 'role:admin']);
// akhir mata pelajaran

// jadwal
Route::resource('jadwal', JadwalController::class)->middleware(['auth', 'role:admin']);
// akhir jadwal



require __DIR__.'/auth.php';
