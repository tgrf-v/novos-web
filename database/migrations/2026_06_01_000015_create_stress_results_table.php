<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stress_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stress_test_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('score');
            $table->enum('result', ['normal', 'ringan', 'sedang', 'berat']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stress_results');
    }
};
