<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->mailData['email']) // Set client's email dynamically
        ->to(env('MAIL_FROM_ADDRESS')) // Replace with the recipient email
        ->subject($this->mailData['subject']) // Set subject dynamically
        ->view('mail.contact-mail') // The email view template
        ->with(['mailData' => $this->mailData]); // Pass data to the view
    }
}
