<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $from = ['From: 1184465220@qq.com','iBook创书网'];
        $to = ['To: to@qq.com','toman'];
        $subject = 'Subject Subject';

        return $this->text('home.email.welcome')
            ->to($to)
            ->from($from)
            ->subject($subject);
    }

}
