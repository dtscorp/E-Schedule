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
use App\Http\Controllers\ChartController;
use GuzzleHttp\Middleware;

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

Route::get('/users', function () {
    return "Hai Sist";
});
Route::get('/login', function () {
    return view('admin.login');
});

Route::get('/about', function () {
    return view('users.about');
});

Route::get('/team', function () {
    return view('users.team');
});

Route::get('/schedule', function () {
    return view('users.schedule');
});


Route::get('/contact', function () {
    return view('users.contact');
});

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/regist_success', function () {
    return view('auth.success');
});
// Route::resource('kategori',kategoriController::class);

Route::resource('user',UserController::class)->middleware('auth');
Route::resource('materi',materiController::class)->middleware('auth');
Route::resource('peserta',pesertaController::class)->middleware('auth');
Route::resource('pengajar',pengajarController::class)->middleware('auth');
Route::resource('/jadwal',jadwalController::class)->middleware('auth');
Route::resource('kelas', kelasController::class)->middleware('auth');

Route::resource('/dashboard',ChartController::class)->middleware('auth');
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

// Route::get('/dashboard', [ChartController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('admin.dashboard.index');
// });

// Route::get('/edit', function () {
//     return view('admin.pengajar.edit');
// });

// Route::get('/edit', function () {
//     return view('admin.peserta.edit');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
