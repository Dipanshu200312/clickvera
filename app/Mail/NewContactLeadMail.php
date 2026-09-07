<?php

namespace App\Mail;

use App\Models\ContactLead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContactLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactLead $lead)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->lead->email],
            subject: 'New Website Lead: '.$this->lead->name,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-lead',
        );
    }
}
