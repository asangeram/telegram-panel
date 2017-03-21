<?php

namespace Nordal\Notifications;

use Illuminate\Bus\Queueable;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class nordalTelegram extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['TelegramChannel::class'];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
                ->to($this->user->phone_number) // Optional.
                ->content("*HELLO!* \n One of your invoices has been paid!") // Markdown supported.
                ->button('View Invoice', $url); // Inline Button
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ]; 
    }
}
