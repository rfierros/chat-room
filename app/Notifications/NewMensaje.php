<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\Mensaje;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMensaje extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Mensaje $mensaje)
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("New Mensaje from {$this->mensaje->user->name}")
                    ->greeting("New Mensaje from {$this->mensaje->user->name}")
                    ->line(Str::limit($this->mensaje->message, 50))
                    ->action('Go to Mensajeer', url('/'))
                    ->line('Thank you for using our application!');
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
