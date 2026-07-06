<?php

use Illuminate\Http\Request;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\MuridController;
use App\Http\Controllers\Api\StatusMengajarController;
use App\Http\Controllers\Api\LaporanMengajarController;
use App\Http\Controllers\Api\DashboardController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::get('/test', function () {
//     return response()->json([
//         'success' => true,
//         'message' => 'API OK'
//     ]);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// START API Controller
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/jadwal', [JadwalController::class, 'index']);

    Route::get('/murid/{id}', [MuridController::class, 'show']);

    Route::get('/laporan', [LaporanMengajarController::class, 'index']);

    Route::put('/jadwal/{id}/mulai', [JadwalController::class, 'mulaiMengajar']);

    Route::put('/jadwal/{id}/selesai', [JadwalController::class, 'selesaiMengajar']);
    // Route::put('/jadwal/{id}/status', [StatusMengajarController::class, 'update']);

    Route::post('/laporan', [LaporanMengajarController::class, 'store']);

});
// AKHIR API CONTROLLER
