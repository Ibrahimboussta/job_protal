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
        Schema::table('applies', function (Blueprint $table) {
            if (!Schema::hasColumn('applies', 'job_id')) {
                $table->unsignedBigInteger('job_id');
                $table->foreign('job_id')->references('id')->on('offres')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applies', function (Blueprint $table) {
            //
            $table->dropForeign(['job_id']);
            $table->dropColumn('job_id');
        });
    }
};
