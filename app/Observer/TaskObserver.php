<?php

namespace App\Observer;

use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use Config;
use Mail;
use SMS;
use App;
use Session;

class TaskObserver
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
        // $task = Task::find($model->id);
        // $order = Order::find($model->order_id);
        $this->user = User::find($model->user_id);

        //Редактору, после того, как ему была назначена задача главным редактором:
        if ($model->user_id) {
            SMS::send($this->user->phone, trans('notification.You have been assigned a new task #.', ['id' => $model->id]));
            Mail::raw(trans('notification.You have been assigned a new task #.', ['id' => $model->id]), function ($message) use ($model) {
                $message->from($this->email);
                $message->to($this->user->email);
                $message->subject(trans('notification.Your order # .', ['id' => $model->id]));
            });
        }

        App::setLocale(Session::get('lang', 'en'));

    }

    public function updated($model)
    {
        $task = Task::find($model->id);
        $order = Order::find($model->order_id);
        $this->user = User::find($model->user_id);


        //Главному редактору, после того, как заказ был принят в работу редактором:
        if ($model->user_id && $task->user_id == 0) {
            SMS::send($this->phone, trans('notification.Order # has been paid and is waiting for an editor.', ['id' => $model->order_id]));
            Mail::raw(trans('notification.Order # has been paid and is waiting for an editor.', ['id' => $model->order_id]), function ($message) use ($model) {
                $message->from($this->email);
                $message->to($this->email);
                $message->subject(trans('notification.Your order # .', ['id' => $model->order_id]));
            });
        }


        //Главному редактору, после того, как заказ был завершён исполнителем:
        if ($model->status == "На проверке" && $task->status != 'На проверке') {
            SMS::send($this->phone, trans('notification.Order # has been completed by an editor and is ready for quality control.', ['id' => $model->order_id]));
            Mail::raw(trans('notification.Order # has been completed by an editor and is ready for quality control.', ['id' => $model->order_id]), function ($message) use ($model) {
                $message->from($this->email);
                $message->to($this->email);
                $message->subject(trans('notification.Your order # .', ['id' => $model->order_id]));
            });
        }


        /*
        // если он был оплачен
        if ($model->sold == 1 && $order->sold == 0) {
            SMS::send($this->phone, trans('notification.An editor has accepted order #.', ['id' => $model->id]));
            Mail::raw(trans('notification.An editor has accepted order #.', ['id' => $model->id]), function ($message) use ($model) {
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

        */

        App::setLocale(Session::get('lang', 'en'));

    }


}


?>