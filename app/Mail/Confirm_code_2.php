<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Confirm_code_2 extends Mailable
{
    use Queueable, SerializesModels;

    public $super_admin;
    public $random_code_2;
    public function __construct($random_code_2, $super_admin)
    {
        $this->super_admin=$super_admin;
        $this->random_code_2=$random_code_2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matulcste@gmail.com')
                    ->view('mail.random_code_2');
    }
}
