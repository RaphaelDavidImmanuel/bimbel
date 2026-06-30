<?php

use Illuminate\Http\Request;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\JadwalController;
use App\Http\Controllers\API\MuridController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// START API Controller
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/murid/{id}', [MuridController::class, 'show']);

});
// AKHIR API CONTROLLER
