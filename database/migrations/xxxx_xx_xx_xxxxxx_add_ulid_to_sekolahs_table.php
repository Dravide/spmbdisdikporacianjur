<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            $table->string('ulid')->nullable()->after('id');
        });

        // Generate ULIDs for existing schools
        $schools = \App\Models\Sekolah::all();
        foreach ($schools as $school) {
            $school->ulid = (string) Str::ulid();
            $school->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sekolahs', function (Blueprint $table) {
            $table->dropColumn('ulid');
        });
    }
};