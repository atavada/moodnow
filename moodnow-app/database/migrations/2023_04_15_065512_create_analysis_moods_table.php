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
            $table->enum('1',['yes','no']);
            $table->enum('2',['yes','no']);
            $table->enum('3',['yes','no']);
            $table->enum('4',['yes','no']);
            $table->string('output');
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
