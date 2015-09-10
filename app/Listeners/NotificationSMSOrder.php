<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Events\Notification;
use Config;
use SMS;

class NotificationSMSOrder
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
        SMS::send(Config::get('link.phone'), 'Задача #' . $event->id . ' выла взята в работу');
    }
}
