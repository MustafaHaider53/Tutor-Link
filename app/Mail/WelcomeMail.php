<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tutor;

    public function __construct($tutor)
    {
        $this->tutor = $tutor;
    }

    public function build()
    {
        return $this->view('email.welcomeEmail')
                    ->with(['tutor' => $this->tutor])
                    ->subject('Welcome to Tutor Link!');
    }
}
