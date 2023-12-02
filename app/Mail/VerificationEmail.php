<?php

// app/Mail/VerificationEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $verificationToken;
    public $name;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct($name, $verificationToken)
    {
        $this->verificationToken = $verificationToken;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Email Verification - Confirm Your Registration')
                    ->markdown('emails.verification')
                    ->with([
                        'verificationToken' => $this->verificationToken,
                        'name' => $this->name,
                    ]);
    }
}
