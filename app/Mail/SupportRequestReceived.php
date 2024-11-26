<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\SupportRequest;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class SupportRequestReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $supportRequest;


    /**
     * Create a new message instance.
     */
    public function __construct(SupportRequest $supportRequest)
    {
        //
        $this->supportRequest = $supportRequest;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Support Request Received')
                    ->markdown('emails.support.request_received')
                    ->with([
                        'supportRequest' => $this->supportRequest,
                    ]);
    }





    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Support Request Received',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
