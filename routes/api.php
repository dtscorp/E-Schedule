<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PengajarController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pengajar', [PengajarController::class, 'index']);
Route::get('/pengajar/{id}', [PengajarController::class, 'show']);
Route::post('/pengajar-create', [PengajarController::class, 'store']);
Route::put('/pengajar/{id}', [PengajarController::class, 'update']);
Route::delete('/pengajar/{id}', [PengajarController::class, 'destroy']);
