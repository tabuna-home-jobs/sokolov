<?php

namespace app\Listeners;

use App\Events\NewOrder;
use App\Models\Order;
use Config;
use SMS;

class NotificationSMSOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param NewOrder $event
     */
    public function handle(NewOrder $event)
    {
        SMS::send(Config::get('link.phone'), 'Новый заказ #'.$event->id.' ожидает рассмотрения');

        $Order = Order::findOrFail($event->id);
        $User = $Order->getUser()->select('phone_notification', 'phone')->first();
        if ($User->phone_notification) {
            SMS::send($User->phone, 'Ваш заказ #'.$event->id.' ожидает рассмотрения');
        }
    }
}
