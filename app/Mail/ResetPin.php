<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\All_user;

class ResetPin extends Mailable
{
    use Queueable, SerializesModels;

   public $data;
   public $user;
    public function __construct($data,$user)
    {
        $this->data=$data;
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
            ->view('mail.resetpin');
    }
}
