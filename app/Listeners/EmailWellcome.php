<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use Mail;
use Config;

class EmailWellcome
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param RegisterUser $event
     */
    public function handle(RegisterUser $event)
    {
        Mail::send('emails.welcome', [], function ($message) use ($event) {
            $message->from(Config::get('link.email'))
                ->to($event->user->email)
                ->subject(trans('email.wellcome'));
        });
    }
}
