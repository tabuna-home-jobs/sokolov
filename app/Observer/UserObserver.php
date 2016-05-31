<?php

namespace App\Observer;

use App\Models\User;
use Config;
use Mail;
use SMS;
use App;
use Session;

class UserObserver
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
        if ($model->type == 'order') {
            $this->user = User::find($model->user_id);

            if ($this->user->type == 'users') {
                //Главному редактору, после того, как клиент оставил комментарий к заказу:
                SMS::send($this->phone, trans('notification.The customer has left a message regarding order #.', ['id' => $model->beglouto]));
                Mail::raw(trans('notification.The customer has left a message regarding order #.', ['id' => $model->beglouto]), function ($message) use ($model) {
                    $message->from($this->email);
                    $message->to($this->email);
                    $message->subject(trans('notification.Your order # .', ['id' => $model->beglouto]));
                });
            } elseif ($this->user->type == 'admin') {
                //Клиенту, после того, как главный редактор оставил комментарий к заказу:
                SMS::send($this->user->phone, trans('notification.A senior editor has left you a message regarding order #.', ['id' => $model->id]));
                Mail::raw(trans('notification.A senior editor has left you a message regarding order #.', ['id' => $model->id]), function ($message) use ($model) {
                    $message->from($this->email);
                    $message->to($this->user->email);
                    $message->subject(trans('notification.Your order # .', ['id' => $model->beglouto]));
                });
            }
        } elseif ($model->type == 'task') {
            $this->user = User::find($model->user_id);
            if ($this->user->type == 'admin') {
                //Редактору, после того, как главный редактор оставил комментарий к заказу:
                SMS::send($this->user->phone, trans('notification.A senior editor has left you a message regarding task #.', ['id' => $model->id]));
                Mail::raw(trans('notification.A senior editor has left you a message regarding task #.', ['id' => $model->id]), function ($message) use ($model) {
                    $message->from($this->email);
                    $message->to($this->user->email);
                    $message->subject(trans('notification.Your order # .', ['id' => $model->beglouto]));
                });
            }
        }

        App::setLocale(Session::get('lang', 'en'));
    }
}
