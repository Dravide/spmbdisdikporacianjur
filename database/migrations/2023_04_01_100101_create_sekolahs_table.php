<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('sekolah_id');
            $table->integer('npsn');
            $table->string('nama_sekolah');
            $table->string('kode_wilayah');
            $table->string('bentuk_pendidikan_id');
            $table->string('status_sekolah');
            $table->string('alamat_jalan');
            $table->string('desa_kelurahan');
            $table->string('rt');
            $table->string('rw');
            $table->string('lintang');
            $table->string('bujur');
            $table->enum('status_online', ['online', 'offline'])->default('offline');
            $table->string('operator')->nullable();
            $table->text('img')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
