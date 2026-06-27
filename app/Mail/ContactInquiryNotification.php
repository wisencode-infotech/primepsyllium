<?php

namespace App\Mail;

use App\Models\ContactInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactInquiry $inquiry,
        public string $renderedSubject,
        public string $renderedBody,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->renderedSubject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-inquiry',
            with: [
                'body' => $this->renderedBody,
                'inquiry' => $this->inquiry,
            ],
        );
    }
}
