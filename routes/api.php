<?php

use App\Http\Controllers\Api\KelasController;
use App\Http\Controllers\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('peserta', 'App\Http\Controllers\Api\pesertaController@index');
Route::get('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@show');
Route::post('peserta-create', 'App\Http\Controllers\Api\pesertaController@store');
Route::put('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@update');
Route::delete('peserta/{id}', 'App\Http\Controllers\Api\pesertaController@destroy');
