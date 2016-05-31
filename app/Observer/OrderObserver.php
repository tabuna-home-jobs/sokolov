<?php

namespace App\Observer;

use App\Models\Order;
use App\Models\User;
use Config;
use Mail;
use SMS;
use App;
use Session;
use CurrencyRate;

class OrderObserver
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

        $model->act = hash('crc32b',$model->id);
        $model->save();

        $this->user = User::find($model->user_id);
        //Главному редактору, после того, как заказ был сформирован клиентом:
        SMS::send($this->phone, trans('notification.New order # is waiting for an invoice.', ['id' => $model->id]));
        Mail::raw(trans('notification.New order # is waiting for an invoice.', ['id' => $model->id]), function ($message) use ($model) {
            $message->from($this->email);
            $message->to($this->email);
            $message->subject(trans('notification.New order # .', ['id' => $model->id]));
        });

        //Клиенту, после того как, заказ был сформирован клиентом:
        SMS::send($this->user->phone, trans('notification.Order # has been received and an invoice will be sent to you soon.', ['id' => $model->id]));
        Mail::raw(trans('notification.Order # has been received and an invoice will be sent to you soon.', ['id' => $model->id]), function ($message) use ($model) {
            $message->from($this->email);
            $message->to($this->user->email);
            $message->subject(trans('notification.Your order # .', ['id' => $model->id]));
        });

        App::setLocale(Session::get('lang', 'en'));
        return $model;
    }

    public function updated($model)
    {
        $order = Order::find($model->id);
        $this->user = User::find($model->user_id);

        // если он был оплачен
        if ($model->sold == 1 && $order->sold == 0) {
            SMS::send($this->phone, trans('notification.Order # has been paid and is waiting for an editor.', ['id' => $model->id]));
            Mail::raw(trans('notification.Order # has been paid and is waiting for an editor.', ['id' => $model->id]), function ($message) use ($model) {
                $message->from($this->email);
                $message->to($this->email);
                $message->subject(trans('notification.Your order # .', ['id' => $model->id]));
            });
        }

        // Клиенту, после того, как готовый заказ возвращён клиенту главным редактором:
        if ($model->status == 'Завершён' && $order != 'Завершён') {
            SMS::send($this->user->phone, trans('notification.Order # has been completed and is ready for you to download.', ['id' => $model->id]));
            Mail::raw(trans('notification.Order # has been completed and is ready for you to download.', ['id' => $model->id]), function ($message) use ($model) {
                $message->from($this->email);
                $message->to($this->user->email);
                $message->subject(trans('notification.Your order # .', ['id' => $model->id]));
            });
        }

        App::setLocale(Session::get('lang', 'en'));
    }

    public function saving($model)
    {
        $order = Order::find($model->id);

        if (is_null($model)) {
            $model->price_rub = CurrencyRate::getOneRecord() * $model->price;
        } elseif (!is_null($model->price) && !is_null($order->price)) {
            if ($model->price != $order->price) {
                $model->price_rub = CurrencyRate::getOneRecord() * $model->price;
            }
        }

        App::setLocale(Session::get('lang', 'en'));
    }
}
