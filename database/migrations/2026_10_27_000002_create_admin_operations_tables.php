<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('billing_cycle', 20);
            $table->string('status', 20)->default('active');
            $table->timestamps();
            $table->index(['status', 'billing_cycle']);
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscription_plan_id')->constrained()->restrictOnDelete();
            $table->string('billing_cycle', 20);
            $table->decimal('amount', 10, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('renewal_date')->nullable();
            $table->string('status', 20)->default('active');
            $table->boolean('auto_renew')->default(false);
            $table->string('payment_method', 80)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status']);
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subscription_id')->nullable()->constrained()->nullOnDelete();
            $table->string('invoice_number', 50)->unique();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->decimal('amount', 10, 2);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->string('status', 20)->default('pending');
            $table->string('billing_email');
            $table->string('phone', 40)->nullable();
            $table->string('billing_address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->text('notes')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status', 'due_date']);
        });

        Schema::create('kit_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('contact_person')->nullable();
            $table->string('contact_number', 40)->nullable();
            $table->string('delivery_address');
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('kit_type', 100);
            $table->unsignedInteger('quantity');
            $table->date('delivery_date');
            $table->string('status', 20)->default('pending');
            $table->string('tracking_number', 100)->nullable();
            $table->string('carrier', 50)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['status', 'delivery_date']);
        });

        Schema::create('partner_labs', function (Blueprint $table) {
            $table->id();
            $table->string('lab_name');
            $table->string('lab_type', 100);
            $table->string('registration_number', 100)->nullable()->unique();
            $table->string('website')->nullable();
            $table->string('email');
            $table->string('contact_person');
            $table->string('phone', 40);
            $table->string('contact_email')->nullable();
            $table->string('position')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->default('Canada');
            $table->string('status', 20)->default('active');
            $table->json('services')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['status', 'lab_type']);
        });

        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('phone', 40);
            $table->date('date_of_birth')->nullable();
            $table->string('employee_id', 50)->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code', 20)->nullable();
            $table->string('country', 100)->default('Canada');
            $table->string('service_area', 100)->nullable();
            $table->string('job_title', 100)->nullable();
            $table->unsignedTinyInteger('years_experience')->nullable();
            $table->string('availability', 20)->default('available');
            $table->string('employment_status', 20)->default('active');
            $table->string('certification_status', 20)->default('pending');
            $table->date('hire_date')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->index(['employment_status', 'availability']);
        });

        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            $table->string('support_email')->nullable();
            $table->string('contact_phone', 40)->nullable();
            $table->string('timezone', 64)->default('UTC');
            $table->string('language', 10)->default('en');
            $table->boolean('email_notifications')->default(true);
            $table->boolean('sms_notifications')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_settings');
        Schema::dropIfExists('technicians');
        Schema::dropIfExists('partner_labs');
        Schema::dropIfExists('kit_deliveries');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('subscription_plans');
    }
};
