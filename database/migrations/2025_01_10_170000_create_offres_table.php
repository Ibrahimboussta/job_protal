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
        Schema::create('offres', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title');
            $table->string('description');
            $table->string('category');
            $table->string('location');
            $table->string('levels');
            $table->integer('salary');
            $table->string('company_image')->nullable();
            $table->boolean('visible')->default(true);
            $table->foreignId('user_id') // Foreign key reference to users table
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
