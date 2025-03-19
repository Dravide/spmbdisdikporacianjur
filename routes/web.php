<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\home\HomeController;
use App\Http\Controllers\hasil\HasilController;
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


//
//Route::get('/register', function () {
//    return redirect()->route('maintenance');
//});
//
//Route::get('/login', function () {
//    return redirect()->route('maintenance');
//});

Route::group(['domain' => 'auth0' . env('SESSION_DOMAIN') . '', 'middleware' => ['redirect']], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

//Route::get('maintenance', [HomeController::class, 'maintenance'])->name('maintenance');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::get('registerr', [RegisterController::class, 'index2'])->name('registerr');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.store');
    Route::get('lupapassword', [LoginController::class, 'lupapassword'])->name('lupapassword');
    Route::post('lupapassword', [LoginController::class, 'lupapasswordstore'])->name('lupapassword.store');
});
Route::group(['domain' => 'spmbdisdikporacianjur.local', 'middleware' => ['redirect']], function () {
//    Route::get('/home2', [HomeController::class, 'index'])->name('myhome2');
    Route::get('/', [HomeController::class, 'index2'])->name('myhome');
    Route::get('/cek', [HomeController::class, 'index2'])->name('cek');
    Route::get('/cek2', [HomeController::class, 'index3'])->name('cek2');
    Route::get('datasekolah', [HomeController::class, 'datasekolah'])->name('datasekolah');
    Route::get('datasekolah/{id}', [HomeController::class, 'detailSekolah'])->name('detailsekolah');
    // Route::get('datasekolahh/{id}', [HomeController::class, 'detailSekolah'])->name('detailsekolahh');
    Route::get('unduh', [HomeController::class, 'unduh'])->name('unduh');
    Route::get('d/{kode}', [HomeController::class, 'validasi'])->name('validasiQR');
    Route::post('getRekapSekolah', [HomeController::class, 'getRekapSekolah'])->name("getRekapSekolah");
});
Route::group(['domain' => 'hasil' . env('SESSION_DOMAIN') . '', 'middleware' => ['redirect']], function () {
//    Route::get('/', [HasilController::class, 'index'])->name('indexHasil');
    Route::match(['GET', 'POST'], '/', [HasilController::class, 'index'])->name('indexHasil');
    // Route::post('/cekHasil', [HasilController::class, 'index2'])->name('indexHasil2');
    Route::post('lulus', [HasilController::class, 'unduhKelulusan'])->name('unduhKelulusan');

});
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware(['auth']);
