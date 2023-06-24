<?php

use App\Http\Controllers\Api\penjadwalController;
use App\Http\Controllers\jadwalController;
use Illuminate\Http\Request;
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
Route::get('/apijadwal',[jadwalController::class,'apiJadwal']);
Route::get('/apijadwal/{id}',[jadwalController::class,'apiJadwaldetail']);

Route::get('penjadwal', [penjadwalController::class,'index']);
Route::get('penjadwal/{id}', [penjadwalController::class,'show']);
Route::post('/penjadwal-create', [penjadwalController::class,'store']);
Route::put('/penjadwal/{id}', [penjadwalController::class,'update']);
Route::delete('/penjadwal/{id}', [penjadwalController::class,'destroy']);
