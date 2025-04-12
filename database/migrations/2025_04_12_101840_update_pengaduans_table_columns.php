<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Only add columns if they don't exist
            if (!Schema::hasColumn('pengaduans', 'tanggapan')) {
                $table->text('tanggapan')->nullable()->after('status');
            }
            if (!Schema::hasColumn('pengaduans', 'operator_id')) {
                $table->foreignId('operator_id')->nullable()->constrained('users')->nullOnDelete()->after('tanggapan');
            }
            if (!Schema::hasColumn('pengaduans', 'tanggal_tanggapan')) {
                $table->timestamp('tanggal_tanggapan')->nullable()->after('operator_id');
            }
            
            // Update the enum values
            DB::statement("ALTER TABLE pengaduans MODIFY COLUMN status ENUM('pending', 'proses', 'selesai', 'rejected') DEFAULT 'pending'");
        });
        
        // Copy data only if old columns exist
        if (Schema::hasColumn('pengaduans', 'response')) {
            DB::statement('UPDATE pengaduans SET tanggapan = response, operator_id = responded_by, tanggal_tanggapan = responded_at');
            
            // Drop the foreign key constraints first
            Schema::table('pengaduans', function (Blueprint $table) {
                $table->dropForeign(['responded_by']);
            });
            
            // Then drop the old columns
            Schema::table('pengaduans', function (Blueprint $table) {
                $table->dropColumn(['response', 'responded_by', 'responded_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Drop the foreign key constraint on operator_id
            $table->dropForeign(['operator_id']);
            
            // Add back the original columns
            $table->text('response')->nullable()->after('status');
            $table->foreignId('responded_by')->nullable()->constrained('users')->nullOnDelete()->after('response');
            $table->timestamp('responded_at')->nullable()->after('responded_by');
            
            // Restore the original enum values if needed
            DB::statement("ALTER TABLE pengaduans MODIFY COLUMN status ENUM('pending', 'processing', 'resolved', 'rejected') DEFAULT 'pending'");
            
            // Copy data back
            DB::statement('UPDATE pengaduans SET response = tanggapan, responded_by = operator_id, responded_at = tanggal_tanggapan');
            
            // Drop the new columns
            $table->dropColumn(['tanggapan', 'operator_id', 'tanggal_tanggapan']);
        });
    }
};
