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
// admin

Route::get('/home', function () {
    return view('admin.home');
});

Route::get('/login', function () {
    return view('admin.login');
});


Route::resource('kategori',kategoriController::class);
Route::resource('materi',materiController::class);
Route::resource('peserta',pesertaController::class);
Route::resource('pengajar',pengajarController::class);
Route::resource('/jadwal',jadwalController::class);
Route::get('jadwal-PDF',[jadwalController::class,'jadwalPDF']);
Route::get('surat-tugas',[jadwalController::class,'pengajarPDF']);
// user
Route::get('/', function () {
    return view('users.layout.index');

});
Route::get('/edit', function () {
    return view('admin.pengajar.edit');

});


