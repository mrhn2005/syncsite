<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StoreNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message,$product_id)
    {
        $this->message = $message;
        $this->product_id = $product_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    public function toDatabase($notifiable)
    {
        // dd($this);
        return [
            'message' => $this->message,
            'product_id'=>$this->product_id,
        ];
    }
    
    public function toMail($notifiable)
    {
        $url = url('/store/home');
    
        return (new MailMessage)
                    ->greeting('سلام')
                    ->line('شما پیامی در محلی جات دریافت کردید:')
                    ->line($this->message)
                    ->action('ورود به حجره', $url);
    }
}
