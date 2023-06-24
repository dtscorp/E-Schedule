<?php

use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MateriController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\materiController as ControllersMateriController;

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

Route::get('jadwal',[apiController::class,'getJadwal']);
Route::resource('materi',MateriController::class);
Route::resource('kelas',KelasController::class);
Route::resource('user', UserController::class);


