<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Tutor;

class TutorNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $tutor;

    public function __construct(Tutor $tutor)
    {
        $this->tutor = $tutor;
    }

    public function build()
    {
        return $this->view('email.tutor-notification')
                    ->subject('Tutoring Opportunity')
                    ->with([
                        'tutorName' => $this->tutor->name,
                        'messageContent' => 'I would like to hire you as my tutor. Please reply if you are available.',
                    ]);
    }
}
