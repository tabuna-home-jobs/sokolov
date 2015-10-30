<?php

namespace App\Providers;

use App\Models\Goods;
use App\Models\News;
use App\Models\Order;
use App\Models\Page;
use App\Models\Shares;
use App\Observer\ConvertValueObserver;
use App\Observer\OrderObserver;
use App\Observer\SlugGenerateObserver;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewOrder' => [
            'App\Listeners\NotificationEmailOrder',
            'App\Listeners\NotificationSMSOrder',
        ],

        'App\Events\Notification' => [
            'App\Listeners\NotificationSMSNotification',
            'App\Listeners\NotificationEmailNotification',
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Page::observe(new SlugGenerateObserver);
        News::observe(new SlugGenerateObserver);
        Shares::observe(new SlugGenerateObserver);
        Goods::observe(new SlugGenerateObserver);
        Order::observe(new ConvertValueObserver);



        Order::observe(new OrderObserver);

    }
}
