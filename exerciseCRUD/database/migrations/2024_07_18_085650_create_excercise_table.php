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
        Schema::create('excercise', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->smallInteger('weight');
            $table->boolean('kgs')->default(true);
            $table->string('description', 1000)->nullable();
            $table->string('reps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excercise');
    }
};
