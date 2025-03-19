<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vervals', function (Blueprint $table) {
            $table->id();
            $table->string('id_pendaftar');
            $table->integer('id_berkas');
            $table->string('data_berkas');
            $table->enum('status', ['terima', 'tolak'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vervals');
    }
};
