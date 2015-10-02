<?php

namespace App\Listeners;

use App\Events\NewOrder;
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
    public function handle(NewOrder $event)
    {
        SMS::send(Config::get('link.phone'), 'Новый заказ #' . $event->id . ' ожидает рассмотрения');
    }
}
