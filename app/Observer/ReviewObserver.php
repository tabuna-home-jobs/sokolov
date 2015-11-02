<?php

namespace App\Observer;

use Config;
use Mail;
use SMS;

class OrderObserver
{

    protected $email;

    protected $phone;

    protected $user;

    public function __construct()
    {
        $this->email = Config::get('link.email');
        $this->phone = Config::get('link.phone');

    }


    public function created($model)
    {
        // Главному редактору, после того, как клиент оставил отзыв к заказу:
        SMS::send($this->phone, trans('notification.The customer has left a review for order #.', ['id' => $model->order_id]));
        Mail::raw(trans('notification.The customer has left a review for order #.', ['id' => $model->order_id]), function ($message) {
            $message->from($this->email);
            $message->to($this->email)->cc($this->email);
        });

    }


}


?>