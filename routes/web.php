<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\pesertaController;
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

// ======================= Layout =======================

Route::get('/', function () {
    return view('users.layout.hero');
});

Route::get('/beranda', function () {
    return view('users.layout.hero');
});

Route::get('/about', function () {
    return view('users.about');
});

Route::get('/team', function () {
    return view('users.team');
});

Route::get('/contact', function () {
    return view('users.contact');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::resource('kategori',kategoriController::class);
Route::resource('materi',materiController::class);
Route::resource('peserta',pesertaController::class);
Route::resource('pengajar',pengajarController::class);
Route::resource('/jadwal',jadwalController::class);

// ======================= Admin =======================
//Route::get('/', function () {
    //return view('admin.login');
//});

//Route::get('/login', function () {
    //return view('admin.login');
//});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/edit', function () {
    return view('admin.pengajar.edit');
});

Route::get('/edit', function () {
    return view('admin.peserta.edit');

});