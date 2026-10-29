<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->boolean('water_monitoring_enabled')->default(false)->after('features');
        });

        $now = now();
        DB::table('subscription_plans')->upsert([
            [
                'name' => 'Basic',
                'description' => 'Essential water-treatment support for growing businesses.',
                'features' => json_encode([
                    'Industry-specific chemical kit',
                    'One monthly expert consultation',
                    'Access to certified service providers',
                    'Equipment health checklists',
                ], JSON_THROW_ON_ERROR),
                'water_monitoring_enabled' => false,
                'amount' => 249,
                'billing_cycle' => 'monthly',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Premium',
                'description' => 'Everything in Basic, plus connected monitoring and reporting.',
                'features' => json_encode([
                    'Industry-specific chemical kit',
                    'One monthly expert consultation',
                    'Access to certified service providers',
                    'Equipment health checklists',
                    'IoT sensor access',
                    'Real-time compliance dashboard',
                    'Automated audit reports',
                    'ESG tracking',
                ], JSON_THROW_ON_ERROR),
                'water_monitoring_enabled' => true,
                'amount' => 499,
                'billing_cycle' => 'monthly',
                'status' => 'active',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ], ['name'], [
            'description',
            'features',
            'water_monitoring_enabled',
            'amount',
            'billing_cycle',
            'status',
            'updated_at',
        ]);

        Schema::create('payment_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscription_plan_id')->constrained()->restrictOnDelete();
            $table->unsignedBigInteger('amount_cents');
            $table->char('currency', 3)->default('CAD');
            $table->string('billing_cycle', 20);
            $table->json('plan_snapshot');
            $table->string('stripe_checkout_session_id')->nullable()->unique();
            $table->string('stripe_subscription_id')->nullable()->unique();
            $table->string('status', 20)->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status']);
        });

        Schema::table('subscriptions', function (Blueprint $table) {
            $table->foreignId('payment_attempt_id')
                ->nullable()
                ->unique()
                ->after('id')
                ->constrained('payment_attempts')
                ->restrictOnDelete();
            $table->string('stripe_subscription_id')->nullable()->unique()->after('payment_attempt_id');
            $table->boolean('water_monitoring_enabled')->default(false)->after('stripe_subscription_id');
            $table->json('features')->nullable()->after('water_monitoring_enabled');
        });

        Schema::create('stripe_events', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_event_id')->unique();
            $table->string('event_type', 100);
            $table->timestamp('handled_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stripe_events');
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['payment_attempt_id']);
            $table->dropUnique(['payment_attempt_id']);
            $table->dropUnique(['stripe_subscription_id']);
            $table->dropColumn([
                'payment_attempt_id',
                'stripe_subscription_id',
                'water_monitoring_enabled',
                'features',
            ]);
        });
        Schema::dropIfExists('payment_attempts');
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropColumn('water_monitoring_enabled');
        });
    }
};
