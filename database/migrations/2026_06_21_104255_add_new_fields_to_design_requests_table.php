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
        Schema::table('design_requests', function (Blueprint $table) {
            $table->string('no_punggung')->nullable()->after('team_name');
            $table->string('detail_sponsor')->nullable()->after('no_punggung');
            $table->enum('jenis_potongan', ['REGULER', 'SLIMFIT CEWE', 'OVERSIZE', 'TUNIK', 'SLIM FIT UNISEX', 'BOXY CUT', 'KIDS'])->nullable()->after('detail_sponsor');
            $table->enum('lengan_jahitan', ['REGULER OVERDECK', 'REGULER PAKAI MANSET', 'RAGLAN A OVERDECK', 'RAGLAN A PAKAI MANSET', 'RAGLAN B OVERDECK', 'RAGLAN B PAKAI MANSET'])->nullable()->after('jenis_potongan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('design_requests', function (Blueprint $table) {
            $table->dropColumn(['no_punggung', 'detail_sponsor', 'jenis_potongan', 'lengan_jahitan']);
        });
    }
};
