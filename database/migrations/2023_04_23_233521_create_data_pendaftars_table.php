<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_pendaftars', function (Blueprint $table) {
            $table->id();
            $table->integer('id_users');
            $table->integer('id_jalur')->nullable();
            $table->integer('id_sekolah')->nullable();
            $table->enum('konfir', ['0', '1', '2'])->default('0');
            $table->enum('verval', ['0', '1', '2'])->default('0');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_pendaftars');
    }
};
