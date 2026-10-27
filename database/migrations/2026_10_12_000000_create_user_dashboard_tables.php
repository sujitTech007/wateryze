<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company')->nullable();
            $table->string('industry')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->json('settings')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user')->index();
        });

        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('site_code')->nullable()->unique();
            $table->string('name');
            $table->string('facility_type')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('province', 100);
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->default('Canada');
            $table->decimal('capacity', 12, 2)->nullable();
            $table->string('treatment_type')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
            $table->index(['user_id', 'name']);
        });

        Schema::create('water_readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('site_id')->constrained()->cascadeOnDelete();
            $table->decimal('ph', 5, 2)->nullable();
            $table->decimal('tds', 12, 3)->nullable();
            $table->decimal('turbidity', 12, 3)->nullable();
            $table->decimal('orp', 12, 3)->nullable();
            $table->decimal('cod', 12, 3)->nullable();
            $table->decimal('bod', 12, 3)->nullable();
            $table->decimal('discharge_flow', 12, 3)->nullable();
            $table->decimal('temperature', 6, 2)->nullable();
            $table->timestamp('recorded_at');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'recorded_at']);
            $table->index(['site_id', 'recorded_at']);
        });

        Schema::create('chemical_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('site_id')->constrained()->cascadeOnDelete();
            $table->string('chemical_name', 120);
            $table->date('usage_date');
            $table->decimal('quantity', 12, 3);
            $table->string('unit', 40);
            $table->string('purpose', 120);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'usage_date']);
        });

        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('site_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('due_at');
            $table->string('status', 20)->default('scheduled');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'due_at', 'status']);
        });

        Schema::create('dashboard_notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('message');
            $table->string('type', 30)->default('system');
            $table->timestamp('read_at')->nullable();
            $table->timestamp('dismissed_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'dismissed_at', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dashboard_notifications');
        Schema::dropIfExists('reminders');
        Schema::dropIfExists('chemical_usages');
        Schema::dropIfExists('water_readings');
        Schema::dropIfExists('sites');

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropColumn([
                'company', 'industry', 'address', 'city', 'province',
                'postal_code', 'country', 'settings',
                'role',
            ]);
        });
    }
};
