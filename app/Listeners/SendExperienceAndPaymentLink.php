<?php

namespace App\Listeners;

use App\Events\EmailVerified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ExperienceAndPaymentLinkEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendExperienceAndPaymentLink implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EmailVerified $event)
    {
        // Retrieve the user from the event
        $user = $event->user;
        Log::info('Handling EmailVerified event for user: '.$user->email);

        // Send the email with the link to the page for selecting experience and payment
        Mail::to($user->email)->send(new ExperienceAndPaymentLinkEmail($user));

        // You can add any additional logic here if needed
    }
}
