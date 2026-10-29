<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payment_attempts', function (Blueprint $table) {
            $table->string('failure_email_status', 20)->default('pending');
            $table->timestamp('failure_email_started_at')->nullable();
            $table->timestamp('failure_email_sent_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('payment_attempts', function (Blueprint $table) {
            $table->dropColumn([
                'failure_email_status',
                'failure_email_started_at',
                'failure_email_sent_at',
            ]);
        });
    }
};
