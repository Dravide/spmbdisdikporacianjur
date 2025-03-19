<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('tahun_pelajaran');
            $table->enum('status_Pendaftaran', ['buka', 'tutup']);
            $table->dateTime('tanggal_buka');
            $table->dateTime('tanggal_tutup');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturans');
    }
};
