<?php

namespace App\Observer;

use Config;
use Mail;
use SMS;
use App;
use Session;
use App\Models\Order;

class ReviewsObserver
{
    protected $email;

    protected $phone;

    protected $user;

    public function __construct()
    {
        $this->email = Config::get('link.email');
        $this->phone = Config::get('link.phone');
        /*
           * Сообщения только на английском
           * Нах тогда я это писал
           *
           */
        App::setLocale('en');
    }

    public function created($model)
    {
        $order = Order::select('act')->where('id', $model->order_id)->first();

        $test = trans('notification.The customer has left a review for order #.', ['id' => $order->act]);
        // Главному редактору, после того, как клиент оставил отзыв к заказу:
        SMS::send($this->phone, $test);
        Mail::raw(trans('notification.The customer has left a review for order #.', ['id' => $order->act]), function ($message) use ($order) {
            $message->from($this->email, trans('notification.Your order # .', ['id' => $order->act]));
            $message->to($this->email);
            $message->subject(trans('notification.Your order # .', ['id' => $order->act]));
        });

        App::setLocale(Session::get('lang', 'en'));
    }
}
