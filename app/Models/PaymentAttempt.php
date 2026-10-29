<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PaymentAttempt extends Model
{
    protected $fillable = [
        'user_id',
        'subscription_plan_id',
        'amount_cents',
        'currency',
        'billing_cycle',
        'plan_snapshot',
        'stripe_checkout_session_id',
        'stripe_subscription_id',
        'status',
        'paid_at',
        'expires_at',
        'tax_amount_cents',
        'total_amount_cents',
        'receipt_status',
        'receipt_started_at',
        'receipt_sent_at',
        'failure_email_status',
        'failure_email_started_at',
        'failure_email_sent_at',
    ];

    protected function casts(): array
    {
        return [
            'plan_snapshot' => 'array',
            'paid_at' => 'datetime',
            'expires_at' => 'datetime',
            'receipt_started_at' => 'datetime',
            'receipt_sent_at' => 'datetime',
            'failure_email_started_at' => 'datetime',
            'failure_email_sent_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id');
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }
}
