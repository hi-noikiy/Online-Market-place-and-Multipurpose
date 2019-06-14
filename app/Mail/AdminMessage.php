<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $mess;
    public $type;
    public function __construct($mess, $type)
    {
        $this->mess=$mess;
        $this->type= $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matulcste@gmail.com')
                    ->view('mail.admin_message');
    }
}
