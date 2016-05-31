<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Models\Order;
use Config;
use Mail;

class NotificationEmailOrder
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
        Mail::raw('Новый заказ #'.$event->id.' ожидает рассмотрения', function ($message) {
            $message->from(Config::get('link.email'));
            $message->to(Config::get('link.email'))->cc(Config::get('link.email'));
        });

        $Order = Order::findOrFail($event->id);
        $User = $Order->getUser()->select('email_notification', 'email')->first();
        if ($User->email_notification) {
            Mail::raw('Ваш заказ #'.$event->id.' ожидает рассмотрения', function ($message) use ($User) {
                $message->from(Config::get('link.email'));
                $message->to($User->email)->cc($User->email);
            });
        }
    }
}
