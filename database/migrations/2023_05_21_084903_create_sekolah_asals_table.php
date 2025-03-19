<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sekolah_asals', function (Blueprint $table) {
            $table->id();
            $table->string('sekolah_id');
            $table->string('npsn');
            $table->string('nama');
            $table->string('kode_wilayah');
            $table->string('bentuk_pendidikan_id');
            $table->string('status_sekolah');
            $table->string('alamat_jalan');
            $table->string('desa_kelurahan');
            $table->string('rt');
            $table->string('rw');
            $table->string('lintang');
            $table->string('bujur');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekolah_asals');
    }
};
