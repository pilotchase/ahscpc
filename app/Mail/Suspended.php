<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Suspended extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $by;
    public $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $by, $reason)
    {
        $this->user = $user;
        $this->by = $by;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('compliance@ahscpc.org', 'Compliance Officer')->markdown('emails.account.suspended')->subject('Membership Suspended');
    }
}
