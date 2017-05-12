<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountCreated extends Mailable
{
    use Queueable, SerializesModels;
    
    public $user;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
        $this->subject = 'Welcome to AHSCPC!';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.account.created')->subject($this->subject);
    }
}
