<?php

// app/Mail/PaymentConfirmationEmail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmationEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $customerName;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Confirmation - Successful Transaction with CertifyRecruit')
                    ->markdown('emails.payment-success')
                    ->with([
                        'user' => $this->customerName,
                    ]);
    }
}

