<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\hasil\HasilController;
use App\Http\Controllers\home\HomeController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Home\Index;
use App\Livewire\Live\Statistics;
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
    
    // Add this route for captcha refresh
    Route::get('/reload-captcha', function() {
        return response()->json(['captcha' => captcha_img('math')]);
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
Route::group(['domain' => config('app.url'), 'middleware' => ['redirect']], function () {
//    Route::get('/home2', [HomeController::class, 'index'])->name('myhome2');
    // Route::get('/', [HomeController::class, 'index'])->name('myhome');
    Route::get('/',Index::class)->name('myhome');
    // Add this line with your other public routes
// Add this with your other public routes
Route::get('/pengaduan', App\Livewire\Home\Pengaduan::class)->name('pengaduan');
// Add this route for captcha refresh
Route::get('/reload-captcha', function() {
    return response()->json(['captcha' => captcha_img('math')]);
});
    // Route::get('/cek', [HomeController::class, 'cek'])->name('cek');
    // Route::get('/cek2', [HomeController::class, 'cek2'])->name('cek2');
    // Route::get('datasekolah', [HomeController::class, 'datasekolah'])->name('datasekolah');
    // Route::get('datasekolah/{id}', [HomeController::class, 'detailSekolah'])->name('detailsekolah');
    // // Route::get('datasekolahh/{id}', [HomeController::class, 'detailSekolah'])->name('detailsekolahh');
    // Route::get('unduh', [HomeController::class, 'unduh'])->name('unduh');
    // Route::get('d/{kode}', [HomeController::class, 'validasi'])->name('validasiQR');
    // Route::post('getRekapSekolah', [HomeController::class, 'getRekapSekolah'])->name("getRekapSekolah");
    // Route::post('hasil', [HasilController::class, 'index'])->name('indexHasil');
    // Route::post('hasil2', [HasilController::class, 'index2'])->name('indexHasil2');
    Route::get('/download', App\Livewire\Home\Download::class)->name('download');
    // Add these routes with your other web routes
    Route::get('/berita', \App\Livewire\Home\News::class)->name('news');
    Route::get('/berita/{id}', \App\Livewire\Home\NewsDetail::class)->name('news.detail');
    Route::get('/jadwal', \App\Livewire\Home\Schedule::class)->name('schedule');
    Route::get('/data-pendaftar', \App\Livewire\Home\DataPendaftarAll::class)->name('data.pendaftar');
    Route::get('/alur-pendaftaran', App\Livewire\Home\AlurPendaftaran::class)->name('alur.pendaftaran');
});
Route::group(['domain' => 'hasil' . config('app.session_domain'), 'middleware' => ['redirect']], function () {
//    Route::get('/', [HasilController::class, 'index'])->name('indexHasil');
//    Route::match(['GET', 'POST'], '/', [HasilController::class, 'index'])->name('indexHasil');
    // Route::post('/cekHasil', [HasilController::class, 'index2'])->name('indexHasil2');
    Route::post('lulus', [HasilController::class, 'unduhKelulusan'])->name('unduhKelulusan');

});
Route::get('logout', [LoginController::class, 'logout'])->name('logout')->middleware(['auth']);

// Add this new route group for the live statistics subdomain
Route::group(['domain' => 'live'.config('app.session_domain'), 'middleware' => ['redirect']], function () {
    Route::get('/{ulid}', Statistics::class)->name('live.statistics');
});

