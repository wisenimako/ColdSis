<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyLogin extends Notification
{
    use Queueable;
 

    /**
     * Create a new notification instance.
     */
    public function __construct(public string $code)
    {
        //
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
    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('filament-otp-login::translations.mail.subject'))
            ->greeting(__('filament-otp-login::translations.mail.greeting'))
            ->line(__('filament-otp-login::translations.mail.line1', ['code' => $this->code]))
            ->line(__('filament-otp-login::translations.mail.line2', ['seconds' => config('filament-otp-login.otp_code.expires')]))
            ->line(__('filament-otp-login::translations.mail.line3'))
            ->salutation(__('filament-otp-login::translations.mail.salutation', ['app_name' => config('app.name')]));
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
