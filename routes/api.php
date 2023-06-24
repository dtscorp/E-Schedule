<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\pesertaController;

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

Route::get('peserta', 'App\Http\Controllers\Api\pesertaController@index');
Route::get('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@show');
Route::post('peserta-create', 'App\Http\Controllers\Api\pesertaController@store');
Route::put('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@update');
Route::delete('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@destroy');