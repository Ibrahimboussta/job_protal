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
            //
            $table->unsignedBigInteger('job_id');  // Add the job_id column
            $table->foreign('job_id')->references('id')->on('offres')->onDelete('cascade');  // Add the foreign key constraint
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
