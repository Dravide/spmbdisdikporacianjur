<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\hasil\HasilController;
use App\Http\Controllers\home\HomeController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home\Index;
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

Route::group(['domain' => 'auth' . config('app.session_domain'), 'middleware' => ['redirect']], function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

//Route::get('maintenance', [HomeController::class, 'maintenance'])->name('maintenance');
//    Route::get('register', [RegisterController::class, 'index'])->name('register');
//    Route::get('registerr', [RegisterController::class, 'index2'])->name('registerr');
//    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
    /*Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.store');*/
    Route::get('lupapassword', [LoginController::class, 'lupapassword'])->name('lupapassword');
    Route::post('lupapassword', [LoginController::class, 'lupapasswordstore'])->name('lupapassword.store');
});
Route::group(['domain' => 'spmbdisdikporacianjur.local', 'middleware' => ['redirect']], function () {
//    Route::get('/home2', [HomeController::class, 'index'])->name('myhome2');
    // Route::get('/', [HomeController::class, 'index'])->name('myhome');
    Route::get('/',Index::class)->name('myhome');
    Route::get('/cek', [HomeController::class, 'cek'])->name('cek');
    Route::get('/cek2', [HomeController::class, 'cek2'])->name('cek2');
    Route::get('datasekolah', [HomeController::class, 'datasekolah'])->name('datasekolah');
    Route::get('datasekolah/{id}', [HomeController::class, 'detailSekolah'])->name('detailsekolah');
    // Route::get('datasekolahh/{id}', [HomeController::class, 'detailSekolah'])->name('detailsekolahh');
    Route::get('unduh', [HomeController::class, 'unduh'])->name('unduh');
    Route::get('d/{kode}', [HomeController::class, 'validasi'])->name('validasiQR');
    Route::post('getRekapSekolah', [HomeController::class, 'getRekapSekolah'])->name("getRekapSekolah");
    Route::post('hasil', [HasilController::class, 'index'])->name('indexHasil');
    Route::post('hasil2', [HasilController::class, 'index2'])->name('indexHasil2');
    Route::get('/download', App\Livewire\Home\Download::class)->name('download');
    // Add these routes with your other web routes
    Route::get('/berita', \App\Livewire\Home\News::class)->name('news');
    Route::get('/berita/{id}', \App\Livewire\Home\NewsDetail::class)->name('news.detail');
    Route::get('/jadwal', \App\Livewire\Home\Schedule::class)->name('schedule');
    Route::get('/data-pendaftar', \App\Livewire\Home\DataPendaftarAll::class)->name('data.pendaftar');
});
Route::group(['domain' => 'hasil' . config('app.session_domain'), 'middleware' => ['redirect']], function () {
//    Route::get('/', [HasilController::class, 'index'])->name('indexHasil');
//    Route::match(['GET', 'POST'], '/', [HasilController::class, 'index'])->name('indexHasil');
    // Route::post('/cekHasil', [HasilController::class, 'index2'])->name('indexHasil2');
    Route::post('lulus', [HasilController::class, 'unduhKelulusan'])->name('unduhKelulusan');

});
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware(['auth']);

