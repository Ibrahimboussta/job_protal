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
        if (!Schema::hasTable('applies')) {
            Schema::create('applies', function (Blueprint $table) {
                $table->id();
                $table->string('full_name');
                $table->string('email');
                $table->string('address');
                $table->string('city');
                $table->string('resume'); // Store path to the file
                $table->timestamps();

                $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete(); // Link to users table
                $table->foreignId('job_id')->constrained('offres')->cascadeOnUpdate()->cascadeOnDelete();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applies');
    }
};
