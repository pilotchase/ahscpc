<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Broadcast extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $message;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message, $sender)
    {
        $this->subject = $subject;
        $this->message = $message;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.broadcast')->subject($this->subject);
    }
}
