<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stress_test_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stress_test_id')->constrained()->cascadeOnDelete();
            $table->text('question');
            $table->integer('order');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stress_test_questions');
    }
};
