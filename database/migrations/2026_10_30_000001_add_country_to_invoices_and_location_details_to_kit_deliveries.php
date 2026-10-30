<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('country', 100)->nullable()->after('province');
        });

        Schema::table('kit_deliveries', function (Blueprint $table) {
            $table->string('country', 100)->nullable()->after('province');
            $table->string('postal_code', 20)->nullable()->after('country');
        });
    }

    public function down(): void
    {
        Schema::table('kit_deliveries', function (Blueprint $table) {
            $table->dropColumn(['country', 'postal_code']);
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('country');
        });
    }
};
