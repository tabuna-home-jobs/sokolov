<?php

namespace App\Listeners;

use App\Events\NewOrder;
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
        Mail::raw('Здравствуйте у вас новый заказ', function ($message) {
            $message->from('us@example.com', 'Laravel');
            $message->to('octavian48@yandex.ru')->cc('octavian48@yandex.ru');
        });
    }
}
