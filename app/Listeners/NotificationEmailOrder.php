<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Events\Notification;
use Config;
use Mail;


class NotificationEmailOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  NewOrder $event
     * @return void
     */
    public function handle(Notification $event)
    {
        Mail::raw('Задача #' . $event->id . ' была взята в работу', function ($message) {
            $message->from(Config::get('link.email'));
        });
    }
}
