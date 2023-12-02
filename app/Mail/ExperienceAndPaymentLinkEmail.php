<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExperienceAndPaymentLinkEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;

        /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Confirmation and Access to Secure Payment Portal - CertifyRecruit')
                    ->markdown('emails.experience-and-payment-link')
                    ->with(['user' => $this->user]);
    }
}
