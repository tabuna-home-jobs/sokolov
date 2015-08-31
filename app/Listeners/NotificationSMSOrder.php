<?php

namespace App\Listeners;

use App\Events\NewOrder;
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
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewOrder $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        SMS::send('89513054530', 'Здравствуйте у вас новый заказ');
    }
}
