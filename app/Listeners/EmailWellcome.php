<?php

namespace App\Listeners;

use App\Events\RegisterUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Config;

class EmailWellcome
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisterUser  $event
     * @return void
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
