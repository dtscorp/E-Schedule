<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\materiController;
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
// admin

Route::get('/home', function () {
    return view('admin.home');
});
Route::resource('kategori',kategoriController::class);
Route::resource('materi',materiController::class);
// user

Route::get('/', function () {
    return view('users.home');
});
