<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewRole extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $changer;
    public $role;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $changer, $role)
    {
        $this->user = $user;
        $this->changer = $changer;
        $this->role = $role;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.new_role')->subject('Welcome to AHSCPC Management!');
    }
}
