<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IpConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $admin;
    public function __construct($token, $admin)
    {
        $this->admin=$admin;
        $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matulcste@gmail.com')
                     ->view('mail.ipconfirm');
                   
    }
}
