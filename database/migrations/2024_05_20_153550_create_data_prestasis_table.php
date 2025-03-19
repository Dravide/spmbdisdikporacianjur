<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('data_prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->string('juara');
            $table->string('tingkat');
            $table->string('lomba');
            $table->foreignId('verval_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_prestasis');
    }
};
