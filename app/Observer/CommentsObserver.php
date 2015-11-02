<?php

namespace App\Observer;

use App\Models\User;
use Config;
use Mail;
use SMS;

class CommentsObserver
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

        if ($model->type == 'order') {
            $this->user = User::find($model->user_id);

            if ($this->user->type == 'users') {
                //Главному редактору, после того, как клиент оставил комментарий к заказу:
                SMS::send($this->phone, trans('notification.The customer has left a message regarding order #.', ['id' => $model->beglouto]));
                Mail::raw(trans('notification.The customer has left a message regarding order #.', ['id' => $model->beglouto]), function ($message) {
                    $message->from($this->email);
                    $message->to($this->email)->cc($this->email);
                });
            } elseif ($this->user->type == 'admin') {
                //Клиенту, после того, как главный редактор оставил комментарий к заказу:
                SMS::send($this->user->phone, trans('notification.A senior editor has left you a message regarding order #.', ['id' => $model->id]));
                Mail::raw(trans('notification.A senior editor has left you a message regarding order #.', ['id' => $model->id]), function ($message) {
                    $message->from($this->email);
                    $message->to($this->user->email)->cc($this->user->email);
                });

            }
        } elseif ($model->type == 'task') {
            $this->user = User::find($model->user_id);
            if ($this->user->type == 'admin') {
                //Редактору, после того, как главный редактор оставил комментарий к заказу:
                SMS::send($this->user->phone, trans('notification.A senior editor has left you a message regarding task #.', ['id' => $model->id]));
                Mail::raw(trans('notification.A senior editor has left you a message regarding task #.', ['id' => $model->id]), function ($message) {
                    $message->from($this->email);
                    $message->to($this->user->email)->cc($this->user->email);
                });

            }
        }

    }


}


?>