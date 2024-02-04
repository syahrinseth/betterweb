<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class MagicLinkLogin extends Mailable
{
    use Queueable, SerializesModels;

    public $plaintextToken;
    public $expiresAt;
    public $verifyRouteName;

    /**
     * Create a new message instance.
     */
    public function __construct($plaintextToken, $expiresAt, $verifyRouteName = 'login.verifyLogin')
    {
        $this->plaintextToken = $plaintextToken;
        $this->expiresAt = $expiresAt;
        $this->verifyRouteName = $verifyRouteName;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Login Verification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.magic-login-link',
            with: [
                'url' => URL::temporarySignedRoute($this->verifyRouteName, $this->expiresAt, [
                    'token' => $this->plaintextToken
                ])
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
