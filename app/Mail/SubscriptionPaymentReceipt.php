<?php

namespace App\Mail;

use App\Models\Subscription;
use App\Models\User;
use Carbon\CarbonInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionPaymentReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $customer,
        public Subscription $subscription,
        public string $paymentReference,
        public string $currency,
        public CarbonInterface $paidAt,
        public int $totalCents,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment confirmed: '.$this->subscription->plan?->name.' subscription',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.subscription-payment-receipt',
            text: 'emails.subscription-payment-receipt-text',
        );
    }
}
