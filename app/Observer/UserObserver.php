<?php

namespace App\Observer;

use App\Models\User;
use Config;
use Mail;

class UserObserver
{
    protected $email;

    protected $phone;

    protected $user;

    public function __construct()
    {
        $this->email = Config::get('link.email');
    }

    public function created($model)
    {
        Mail::send('emails.welcome', ['user' => $model], function ($message) use ($model) {
            $message->from($this->email);
            $message->to($model->email);
            $message->subject(trans('Спасибо за регистрацию'));
        });
    }
}
