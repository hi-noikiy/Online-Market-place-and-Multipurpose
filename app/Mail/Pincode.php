<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\All_user;
use Illuminate\Contracts\Queue\ShouldQueue;

class Pincode extends Mailable
{
    use Queueable, SerializesModels;

    public $num;
    public $user;
    public function __construct($num,$user)
    {
        $this->num=$num;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kcephas3@gmail.com')
                    ->view('mail.pincode');
    }
}
