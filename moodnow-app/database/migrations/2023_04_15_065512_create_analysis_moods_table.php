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
        Schema::create('analysis_moods', function (Blueprint $table) {
            $table->id();
            $table->string('logic');
            $table->enum('quiz_1',['yes','no'])->nullable();
            $table->enum('quiz_2',['yes','no'])->nullable();
            $table->enum('quiz_3',['yes','no'])->nullable();
            $table->enum('quiz_4',['yes','no'])->nullable();
            $table->string('output')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_moods');
    }
};
