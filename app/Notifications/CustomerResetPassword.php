<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a new notification instance.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('محلی جات - تغییر رمز عبور')
            ->line('
            شما این ایمیل را به این خاطر دریافت کرده اید که درخواست بازنشانی رمز عبور در سایت محلی جات کرده اید.
            ')
            ->action('بازگردانی رمز عبور', url('customer/password/reset', $this->token))
            ->line('
            اگر شما درخواست رمز عبور جدید نکرده اید. این ایمیل را نادیده بگیرید.
            ');
    }
}
