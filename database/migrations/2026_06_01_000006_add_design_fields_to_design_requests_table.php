<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('design_requests', function (Blueprint $table) {
            $table->string('motif')->nullable()->after('team_name');
            $table->string('material')->nullable()->after('motif');
            $table->string('collar_style')->nullable()->after('material');
        });
    }

    public function down(): void
    {
        Schema::table('design_requests', function (Blueprint $table) {
            $table->dropColumn(['motif', 'material', 'collar_style']);
        });
    }
};
