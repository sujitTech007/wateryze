<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sensor_api_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('site_id')->constrained()->cascadeOnDelete();
            $table->text('endpoint_url');
            $table->text('bearer_token')->nullable();
            $table->json('parameter_map');
            $table->string('timestamp_path', 150)->nullable();
            $table->string('last_sample_hash', 64)->nullable();
            $table->timestamp('last_synced_at')->nullable();
            $table->string('last_sync_error', 500)->nullable();
            $table->timestamps();
            $table->index(['user_id', 'site_id']);
        });

        Schema::table('water_readings', function (Blueprint $table) {
            $table->foreignId('sensor_api_connection_id')
                ->nullable()
                ->after('site_id')
                ->constrained()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('water_readings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('sensor_api_connection_id');
        });

        Schema::dropIfExists('sensor_api_connections');
    }
};
