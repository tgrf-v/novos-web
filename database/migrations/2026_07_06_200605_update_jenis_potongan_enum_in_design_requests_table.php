<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE design_requests MODIFY COLUMN jenis_potongan ENUM('REGULER', 'SLIMFIT CEWE', 'OVERSIZE', 'TUNIK', 'SLIM FIT UNISEX', 'BOXY CUT', 'KIDS') NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE design_requests MODIFY COLUMN jenis_potongan ENUM('REGULER', 'SLIMFIT CEWE', 'OVERSIZE', 'TUNIK', 'SLIM FIT UNISEX') NULL");
    }
};
