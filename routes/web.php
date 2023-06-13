<?php

use App\Http\Controllers\kategoriController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\pesertaController;
use App\Http\Controllers\UserController;
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

Route::get('/',[LandingPageController::class,'hero']);
Route::get('/teacher',[LandingPageController::class,'teacher']);
Route::get('/class',[LandingPageController::class,'kelas']);


Route::get('/login', function () {
    return view('admin.login');
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


// Route::resource('kategori',kategoriController::class);
Route::resource('user',UserController::class);
Route::resource('materi',materiController::class);
Route::resource('peserta',pesertaController::class);
Route::resource('pengajar',pengajarController::class);
Route::resource('/jadwal',jadwalController::class);
Route::resource('kelas', kelasController::class);

Route::get('jadwal-PDF',[jadwalController::class,'jadwalPDF']);
Route::get('surat-tugas',[jadwalController::class,'pengajarPDF']);
// user
//Route::get('/', function () {
  //  return view('users.layout.index');

// });


//});

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
