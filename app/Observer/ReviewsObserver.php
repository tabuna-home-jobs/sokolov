<?php

namespace App\Observer;

use Config;
use Mail;
use SMS;
use App;
use Session;

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
        // Главному редактору, после того, как клиент оставил отзыв к заказу:
        SMS::send($this->phone, trans('notification.The customer has left a review for order #.', ['id' => $model->order_id]));
        Mail::raw(trans('notification.The customer has left a review for order #.', ['id' => $model->order_id]), function ($message) use ($model) {
            $message->from($this->email, trans('notification.Your order # .', ['id' => $model->order_id]));
            $message->to($this->email);
            $message->subject(trans('notification.Your order # .', ['id' => $model->order_id]));
        });

        App::setLocale(Session::get('lang', 'en'));
    }


}


?>