<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

// note: this handles the email structure with proper subject line and reply-to address set to the sender's email
// Source: https://mailtrap.io/blog/send-email-in-laravel/
// Source: https://laravel.com/docs/12.x/mail#generating-mailables
class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance. Fills in resources\views\emails\contact-form.blade.php.
     */
    public function __construct(
        public string $senderName,
        public string $senderEmail,
        public string $messageContent,
    ) {}

    /**
     * Get the message envelope.
     * This defines the subject and the recipients.
     * Source: https://laravel.com/docs/12.x/mail#using-the-envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Contact Form Submission from '.$this->senderName,
            replyTo: [$this->senderEmail],
        );
    }

    /**
     * Get the message content definition.
     * This is my contact-form.blade.php view.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form',
        );
    }

    /**
     * Get the attachments for the message. Returns an array of attachments.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
