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

    public function __construct($token)
    {
        $this->token = $token;

    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $resetUrl = url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset(), 'language' => app()->getLocale()], true));


        return (new MailMessage())
            ->subject(__('Reset Password Notification'))
            ->markdown('vendor.notifications.reset-password', ['url' => $resetUrl]);
    }
}
