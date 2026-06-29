<?php

namespace App\Mail;

use App\Models\ContactInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactInquiryReply extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactInquiry $inquiry,
        public string $replyMessage,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Re: Your inquiry to '.config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-inquiry-reply',
            with: [
                'inquiry' => $this->inquiry,
                'replyMessage' => $this->replyMessage,
            ],
        );
    }
}
