<?php

namespace App\Listeners;

use App\Events\NewOrder;
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
    public function handle(NewOrder $event)
    {
        Mail::raw('Новый заказ #' . $event->id . ' ожидает рассмотрения', function ($message) {
            $message->from(Config::get('link.email'));
            $message->to(Config::get('link.email'))->cc(Config::get('link.email'));
        });
    }
}
