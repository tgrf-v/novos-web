<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropUnique(['midtrans_order_id']);
            $table->string('midtrans_order_id')->nullable()->change();
            $table->string('midtrans_transaction_id')->nullable()->change();
            $table->string('payment_proof')->nullable()->after('paid_at');
            $table->string('payment_proof_name')->nullable()->after('payment_proof');
            $table->text('notes')->nullable()->after('payment_proof_name');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['payment_proof', 'payment_proof_name', 'notes']);
            $table->string('midtrans_transaction_id')->nullable(false)->change();
            $table->string('midtrans_order_id')->nullable(false)->change();
            $table->unique('midtrans_order_id');
        });
    }
};
