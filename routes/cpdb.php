<?php

/*
# Pendaftaran PPDB SMP DISDIKPORA CIANJUR
| Route Khuss Halaman Pendaftaran Pusat PPDB SMP DISDIKPORA CIANJUR
*/

use App\Http\Controllers\Pendaftaran\BerandaController;
use App\Http\Controllers\Pendaftaran\BerkasKhususController;
use App\Http\Controllers\Pendaftaran\BerkasUmumController;
use App\Http\Controllers\Pendaftaran\DataPesertaController;
use App\Http\Controllers\Pendaftaran\SekolahTujuanController;

Route::group(['domain' => 'murid' . config('app.session_domain'), 'middleware' => ['auth', 'CekRole:cpdb']], function () {

    Route::get('/', fn() => redirect()->route('pendaftaran.beranda')); // Beranda
    Route::get('beranda', [BerandaController::class, 'index'])->name('pendaftaran.beranda'); // Beranda
    Route::get('beranda2', [BerandaController::class, 'index2'])->name('pendaftaran.beranda2'); // Beranda
    Route::post('beranda2-post', [BerandaController::class, 'index2Post'])->name('pendaftaran.beranda2post'); // Beranda
    Route::get('swalError', [BerandaController::class, 'swalError'])->name('pendaftaran.swal'); // Beranda

    Route::post('cutoff', [BerandaController::class, 'cutoff'])->name('pendaftaran.cutoff');
    Route::get('cetak/kartu-akun', [BerandaController::class, 'cetak_akun'])->name('cpdb.cetak_akun');
    Route::get('cetak/paktaintegritas', [BerandaController::class, 'integritas'])->name('cpdb.integritas');
    Route::get('cetak/buktipendaftaran', [BerandaController::class, 'buktipendaftaran'])->name('cpdb.buktipendaftaran');
    Route::post('jenis', [BerandaController::class, 'jenis'])->name('pendaftaran.jenis');
    Route::post('konfirmasi', [BerandaController::class, 'konfirmasi'])->name('pendaftaran.konfirmasi');


    // Data Peserta
    Route::get('data-peserta', [DataPesertaController::class, 'index'])->name('Pendaftaran.datapeserta');
    Route::post('dataluarkab', [DataPesertaController::class, 'storeLuarKab'])->name('Pendaftaran.luarkab');
    Route::post('datadalamkab', [DataPesertaController::class, 'storeDalamKab'])->name('Pendaftaran.dalamkab');
    Route::post('cekNISN', [DataPesertaController::class, 'cekNISN'])->name('cekNISN');

    // Berkas UMUM
    Route::get('berkasumum', [BerkasUmumController::class, 'index'])->name('pendaftaran.berkasumum');
    Route::post('upload', [BerkasUmumController::class, 'upload'])->name('pendaftaran.upload');
    Route::delete('delete', [BerkasUmumController::class, 'tmpDelete'])->name('pendaftaran.delete');
    Route::post('uploadberkas', [BerkasUmumController::class, 'uploadberkas'])->name('uploadberkas');
    Route::delete('hapusberkas', [BerkasUmumController::class, 'delete'])->name('hapusberkas');
    Route::post('updatedata', [BerkasUmumController::class, 'updateData'])->name('updatedata');

    // Berkas KHUSUS
    Route::get('berkaskhusus', [BerkasKhususController::class, 'index'])->name('Pendaftaran.berkaskhusus');

    // Sekolah Tujuan
    Route::get('sekolah-tujuan', [SekolahTujuanController::class, 'index'])->name('sekolah-tujuan.index');
    Route::get('getDataSekolah', [SekolahTujuanController::class, 'getDataSekolah'])->name('sekolah-tujuan.getDataSekolah');
    Route::put('sekolah-tujuan', [SekolahTujuanController::class, 'update'])->name('sekolah-tujuan.update');
    Route::get('getDataSekolahById', [SekolahTujuanController::class, 'getDataSekolahById'])->name('sekolah-tujuan.getDataSekolahById');

    Route::get('jenis', function () {
        return view('Pendaftaran.jenis');
    })->name('jenis');
});
# END Pendaftaran PPDB SMP DISDIKPORA CIANJUR
