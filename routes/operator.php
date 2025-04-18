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
# NARA OPERATOR SMP DISDIKPORA CIANJUR
| Route Khuss Halaman Nara Admin Pusat PPDB SMP DISDIKPORA CIANJUR
*/

use App\Http\Controllers\operator\BerandaController;
use App\Http\Controllers\operator\DataPendaftar;
use App\Http\Controllers\operator\exporExcelController as unduhExcelController;
use App\Http\Controllers\operator\HasilController;
use App\Http\Controllers\operator\Maps;
use App\Http\Controllers\operator\PemetaanDomisiliController;
use App\Http\Controllers\operator\PengumumanController;
use App\Http\Controllers\operator\RekapVervalController;
use App\Http\Controllers\operator\Verval;
use App\Livewire\Operator\Pengaduan; // Add this line

// Add this line in the use statements section at the top
use App\Livewire\Operator\Tiket;

Route::group(['domain' => 'app' . config('app.session_domain'), 'middleware' => ['auth', 'CekRole:operator']], function () {
    Route::get('/', function () {
        return redirect()->route('operator.home');
    });
    Route::get('home', [BerandaController::class, 'index'])->name('operator.home');
    Route::get('pengaturan', [BerandaController::class, 'pengaturan'])->name('operator.pengaturan');
//        Route::get('unduh-excel', [unduhExcelController::class, 'index'])->name('operator.unduh-excel');
    Route::get('unduh-excel', [unduhExcelController::class, 'index'])->name('operator.unduh-excel');
    Route::get('unduh-excel/zonasi', [unduhExcelController::class, 'unduhZonasi'])->name('operator.unduh-excel-zonasi');

    Route::get('excel/exportdata', [unduhExcelController::class, 'exportdata'])->name('operator.excel.exportdata');
    Route::get('excel/zonasi', [unduhExcelController::class, 'zonasi'])->name('operator.excel.zonasi');
    Route::get('excel/pana', [unduhExcelController::class, 'pana'])->name('operator.excel.pana');
    Route::get('excel/tahfidz', [unduhExcelController::class, 'tahfidz'])->name('operator.excel.tahfidz');
    Route::get('excel/afirmasi', [unduhExcelController::class, 'afirmasi'])->name('operator.excel.afirmasi');
    Route::get('excel/anakguru', [unduhExcelController::class, 'anakguru'])->name('operator.excel.anakguru');
    Route::get('excel/pindahtugas', [unduhExcelController::class, 'pindahtugas'])->name('operator.excel.pindahtugas');
    Route::get('excel/raport', [unduhExcelController::class, 'raport'])->name('operator.excel.raport');
    Route::get('excel/ranking', [unduhExcelController::class, 'ranking'])->name('operator.excel.ranking');
    Route::get('unduh-excel/ranking', [unduhExcelController::class, 'ranking'])->name('operator.unduh-excel-ranking');
    Route::get('unduh-excel/raport', [unduhExcelController::class, 'raport'])->name('operator.unduh-excel-raport');
    Route::get('unduh-excel/nona', [unduhExcelController::class, 'nona'])->name('operator.unduh-excel-nona');
    Route::get('unduh-excel/tahfidz', [unduhExcelController::class, 'tahfidz'])->name('operator.unduh-excel-tahfidz');
    Route::get('unduh-excel/afirmasi', [unduhExcelController::class, 'afirmasi'])->name('operator.unduh-excel-afirmasi');
    Route::get('unduh-excel/pindah-tugas', [unduhExcelController::class, 'ptot'])->name('operator.unduh-excel-ptot');
    Route::get('unduh-excel/anak-guru', [unduhExcelController::class, 'ag'])->name('operator.unduh-excel-ag');


    Route::post('post-pengaturan', [BerandaController::class, 'postPengaturan'])->name('operator.post-pengaturan');
    Route::post('post-ganti-password', [BerandaController::class, 'postGantiPassword'])->name('operator.post-ganti-password');
    Route::get('datapendaftar', [DataPendaftar::class, 'index'])->name('operator.datapendaftar');
    Route::get('verval/{kode}', [Verval::class, 'index'])->name('operator.verval');
    Route::get('verval/rekap/{kode}', [Verval::class, 'rekapjalur'])->name('operator.verval.rekap.jalur');
    Route::get('verval/id/{kode}', App\Livewire\Operator\VervalPendaftar::class)->name('operator.verval.pendaftar');
    Route::get('verval/berkas', [Verval::class, 'getBerkas'])->name('operator.verval.getBerkas');
    Route::put('verval', [Verval::class, 'update'])->name('operator.verval.update');
    // Route::post('whatsapp', [Verval::class, 'whatsapp'])->name('operator.verval.whatsapp'); // Diganti dengan Livewire
    // Route::post('verval/reset', [Verval::class, 'reset'])->name('operator.verval.reset'); // Diganti dengan Livewire
    Route::get('rekapverval', [RekapVervalController::class, 'index'])->name('operator.rekapverval');

    Route::get('pengumuman', [PengumumanController::class, 'index'])->name('operator.pengumuman');
    Route::post('post-pengumuman', [PengumumanController::class, 'post'])->name('operator.pengumumanPost');
    Route::post('post-reset-pengumuman', [PengumumanController::class, 'postResetPengumuman'])->name('operator.postResetPengumuman');

    Route::get('operator/previewkelulusan', [PengumumanController::class, 'preview'])->name('operator.preview');

    Route::get('preview', [unduhExcelController::class, 'preview']);

    Route::get('hasil', [HasilController::class, 'index'])->name('operator.hasil');
    Route::post('hasil', [HasilController::class, 'import'])->name('operator.hasil.import');
    Route::delete('hasil', [HasilController::class, 'reset'])->name('operator.hasil.reset');

    //Pemetaan Domisili
    Route::get('pemetaandomisili', [PemetaanDomisiliController::class, 'index'])->name('operator.pemetaandomisili');
    Route::get('maps', [Maps::class, 'index'])->name('operator.maps');
    
    // Add this new route for pengaduan
    Route::get('/pengaduan', Pengaduan::class)->name('operator.pengaduan');
    // Add this line inside the Route::group
    Route::get('/tiket', Tiket::class)->name('operator.tiket');
});
# END OPERATOR PPDB SMP DISDIKPORA CIANJUR
