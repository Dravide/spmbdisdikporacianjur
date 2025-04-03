<?php

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

/*
# NARA PPDB SMP DISDIKPORA CIANJUR
| Route Khuss Halaman Nara Admin Pusat PPDB SMP DISDIKPORA CIANJUR
*/

use App\Http\Controllers\nara\BeritaController;
use App\Http\Controllers\nara\BerkasController;
use App\Http\Controllers\nara\DataPendaftarController;
use App\Http\Controllers\nara\HomeController;
use App\Http\Controllers\nara\JalurController;
use App\Http\Controllers\nara\PengaturanController;
use App\Http\Controllers\nara\SekolahController;
use App\Http\Controllers\Nara\SekolahDasar;
use App\Livewire\Nara\BeritaManager;
use App\Livewire\Nara\DocumentManager;
use App\Livewire\Nara\ScheduleManager;

Route::group(['domain' => 'nara' . config('app.session_domain'), 'middleware' => ['auth', 'CekRole:nara']], function () {
    Route::get('/', fn() => redirect()->route('nara.home'));
    Route::get('home', HomeController::class)->name('nara.home');
    Route::get('berita', [BeritaController::class, 'berita'])->name('nara.berita');
    Route::get('add-berita', [BeritaController::class, 'add_berita'])->name('nara.add-berita');
    
    // New Livewire Berita Manager route
    Route::get('berita-manager', BeritaManager::class)->name('nara.berita-manager');
    
    // New Livewire Schedule Manager route
    Route::get('schedule-manager', ScheduleManager::class)->name('nara.schedule-manager');
    
    // New Livewire Document Manager route
    Route::get('document-manager', DocumentManager::class)->name('nara.document-manager');
    
    Route::resource('jalur', JalurController::class);
    Route::resource('sekolah', SekolahController::class);
    Route::resource('berkas', BerkasController::class);
    Route::get('datapendaftar/cari', [DataPendaftarController::class, 'cari'])->name('cari');
    Route::post('datapendaftar/reset', [DataPendaftarController::class, 'reset'])->name('reset');
    Route::post('datapendaftar/password', [DataPendaftarController::class, 'password'])->name('password');
    Route::post('datapendaftar/jenis', [DataPendaftarController::class, 'jenis'])->name('jenispendaftaran');
    Route::resource('datapendaftar', DataPendaftarController::class);
    Route::resource('pengaturan', PengaturanController::class);
    Route::resource('sekolahdasar', SekolahDasar::class);

    Route::post('upload', [SekolahController::class, 'upload'])->name('sekolah.upload');
    Route::delete('delete', [SekolahController::class, 'tmpDelete'])->name('sekolah.delete');
});
# END NARA PPDB SMP DISDIKPORA CIANJUR
