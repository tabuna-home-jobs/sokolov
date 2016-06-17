<?php

namespace App\Providers;

use App\Models\Comments;
use App\Models\Goods;
use App\Models\Examples;
use App\Models\News;
use App\Models\Order;
use App\Models\Page;
use App\Models\Review;
use App\Models\Shares;
use App\Models\Task;
use App\Models\Blog;
use App\Models\User;
use App\Observer\CommentsObserver;
use App\Observer\OrderObserver;
use App\Observer\ReviewsObserver;
use App\Observer\SlugGenerateObserver;
use App\Observer\TaskObserver;
use App\Observer\UserObserver;
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
        ],

        'App\Events\RegisterUser' => [
          'App\Listeners\EmailWellcome',
        ],

    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Page::observe(new SlugGenerateObserver());
        News::observe(new SlugGenerateObserver());
        Blog::observe(new SlugGenerateObserver());
        Shares::observe(new SlugGenerateObserver());
        Goods::observe(new SlugGenerateObserver());
        Examples::observe(new SlugGenerateObserver());
        //Order::observe(new ConvertValueObserver);
        Review::observe(new ReviewsObserver());
        Order::observe(new OrderObserver());
        //Task::observe(new TaskObserver());
        Comments::observe(new CommentsObserver());
        User::observe(new UserObserver());
    }
}
