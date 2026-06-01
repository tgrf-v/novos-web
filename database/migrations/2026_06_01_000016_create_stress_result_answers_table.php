<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stress_result_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stress_result_id')->constrained()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('stress_test_questions')->cascadeOnDelete();
            $table->integer('answer');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stress_result_answers');
    }
};
