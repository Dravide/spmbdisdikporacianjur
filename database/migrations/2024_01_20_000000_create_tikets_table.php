<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_tiket', ['reset_password', 'delete_account', 'change_registration']);
            $table->string('nisn', 10);
            $table->string('nama_siswa');
            $table->text('deskripsi');
            $table->enum('status', ['pending', 'process', 'completed', 'rejected'])->default('pending');
            $table->foreignId('operator_id')->constrained('users');
            $table->foreignId('sekolah_id')->constrained('sekolahs');
            $table->text('catatan_admin')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tikets');
    }
};