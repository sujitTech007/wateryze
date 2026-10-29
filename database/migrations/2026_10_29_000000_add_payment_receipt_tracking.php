<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payment_attempts', function (Blueprint $table) {
            $table->unsignedBigInteger('tax_amount_cents')->default(0)->after('paid_at');
            $table->unsignedBigInteger('total_amount_cents')->default(0)->after('tax_amount_cents');
            $table->string('receipt_status', 20)->default('pending')->after('total_amount_cents');
            $table->timestamp('receipt_started_at')->nullable()->after('receipt_status');
            $table->timestamp('receipt_sent_at')->nullable()->after('receipt_started_at');
        });
    }

    public function down(): void
    {
        Schema::table('payment_attempts', function (Blueprint $table) {
            $table->dropColumn([
                'tax_amount_cents',
                'total_amount_cents',
                'receipt_status',
                'receipt_started_at',
                'receipt_sent_at',
            ]);
        });
    }
};
