<?php

namespace App\Mail;

use App\Models\User;
use Carbon\CarbonInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubscriptionPaymentFailure extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $customer,
        public string $planName,
        public string $billingCycle,
        public string $currency,
        public int $amountCents,
        public CarbonInterface $attemptedAt,
        public string $reason,
        public ?string $paymentReference,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Payment not completed: '.$this->planName.' plan');
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.subscription-payment-failure',
            text: 'emails.subscription-payment-failure-text',
        );
    }
}
