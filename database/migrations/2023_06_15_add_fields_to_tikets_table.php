<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tikets', function (Blueprint $table) {
            if (!Schema::hasColumn('tikets', 'admin_id')) {
                $table->unsignedBigInteger('admin_id')->nullable();
                $table->foreign('admin_id')->references('id')->on('users');
            }
            
            if (!Schema::hasColumn('tikets', 'catatan_admin')) {
                $table->text('catatan_admin')->nullable();
            }
            
            if (!Schema::hasColumn('tikets', 'processed_at')) {
                $table->timestamp('processed_at')->nullable();
            }
            
            if (!Schema::hasColumn('tikets', 'completed_at')) {
                $table->timestamp('completed_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tikets', function (Blueprint $table) {
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
            $table->dropColumn('catatan_admin');
            $table->dropColumn('processed_at');
            $table->dropColumn('completed_at');
        });
    }
};