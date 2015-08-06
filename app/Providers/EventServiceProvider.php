<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Goods;
use App\Models\News;
use App\Models\Page;
use App\Models\Shares;
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
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
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
        Category::observe(new SlugGenerateObserver);
        Goods::observe(new SlugGenerateObserver);
    }
}
