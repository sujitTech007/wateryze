<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('receipt_status', 20)->default('pending');
            $table->timestamp('receipt_started_at')->nullable();
            $table->timestamp('receipt_sent_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn([
                'receipt_status',
                'receipt_started_at',
                'receipt_sent_at',
            ]);
        });
    }
};
