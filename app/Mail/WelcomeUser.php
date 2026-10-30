<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $customer) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Welcome to Wateryze');
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome-user',
            text: 'emails.welcome-user-text',
        );
    }
}
