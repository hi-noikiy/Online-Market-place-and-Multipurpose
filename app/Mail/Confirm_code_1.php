<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Confirm_code_1 extends Mailable
{
    use Queueable, SerializesModels;

    public $random_code_1;
    public $admin;
    public function __construct($random_code_1,$admin)
    {
        $this->admin=$admin;
        $this->random_code_1=$random_code_1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('matulcste@gmail.com')
                    ->view('mail.random_code_1');
    }
}
