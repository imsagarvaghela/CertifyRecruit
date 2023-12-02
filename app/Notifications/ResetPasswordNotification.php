<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    protected $token;

    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = url(config('app.url').route('password.reset', $this->token, false));
        return (new MailMessage)
            ->line('Dear ' . $notifiable->name . ',') // Include the user's name here
            ->line('I hope this email finds you well. We are writing to inform you that a password reset request has been received for your account with CertifyRecruit.')
            // Rest of your email template
            ->action('Reset Password', url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->email], false)))
            ->line('Please note that this password reset link will expire in 60 minutes. If you did not initiate this password reset request, no further action is required. We recommend that you disregard this email and take measures to secure your account.')
            ->line('If you have any concerns or questions regarding this password reset request or your account\'s security, please do not hesitate to contact our support team at Support@certifyrecruit.com. Our team is here to assist you promptly.')
            ->line('Your account\'s security is of utmost importance to us, and we appreciate your attention to this matter. Thank you for choosing CertifyRecruit.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
