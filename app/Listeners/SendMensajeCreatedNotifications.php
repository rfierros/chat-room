<?php

namespace App\Listeners;

use App\Events\MensajeCreated;
use App\Models\User;
use App\Notifications\NewMensaje;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMensajeCreatedNotifications
{
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
    public function handle(MensajeCreated $event): void
    {
        foreach (User::whereNot('id', $event->mensaje->user_id)->cursor() as $user) {
            $user->notify(new NewMensaje($event->mensaje));
        }
    }
}
