<?php

namespace App\Observer;

use App\Models\Order;
use App\Models\User;
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
        $this->user = User::find($model->user_id);

        //Главному редактору, после того, как заказ был сформирован клиентом:
        SMS::send($this->phone, trans('notification.New order # is waiting for an invoice.', ['id' => $model->id]));
        Mail::raw(trans('notification.New order # is waiting for an invoice.', ['id' => $model->id]), function ($message) {
            $message->from($this->email);
            $message->to($this->email)->cc($this->email);
        });

        //Клиенту, после того как, заказ был сформирован клиентом:
        SMS::send($this->user->phone, trans('notification.Order # has been received and an invoice will be sent to you soon.', ['id' => $model->id]));
        Mail::raw(trans('notification.Order # has been received and an invoice will be sent to you soon.', ['id' => $model->id]), function ($message) {
            $message->from($this->email);
            $message->to($this->user->email)->cc($this->user->email);
        });

    }


    public function updated($model)
    {
        $order = Order::find($model->id);
        $this->user = User::find($model->user_id);


        // если он был оплачен
        if ($model->sold == 1 && $order->sold == 0) {
            SMS::send($this->phone, trans('notification.Order # has been paid and is waiting for an editor.', ['id' => $model->id]));
            Mail::raw(trans('notification.Order # has been paid and is waiting for an editor.', ['id' => $model->id]), function ($message) {
                $message->from($this->email);
                $message->to($this->email)->cc($this->email);
            });
        }


    }


}


?>