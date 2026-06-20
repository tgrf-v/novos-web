<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('stress_result_answers');
        Schema::dropIfExists('stress_results');
        Schema::dropIfExists('stress_test_questions');
        Schema::dropIfExists('stress_tests');
    }

    public function down(): void
    {
        // Tables are being removed permanently — no rollback
    }
};
