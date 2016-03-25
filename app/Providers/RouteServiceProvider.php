<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        $router->bind('page', function($value) {
                return \App\Models\Page::where('slug', $value)->firstOrFail();
        });
        $router->bind('news', function($value) {
                return \App\Models\News::where('slug', $value)->firstOrFail();
        });
        $router->bind('blog', function($value) {
                return \App\Models\Blog::where('slug', $value)->firstOrFail();
        });
        $router->bind('shares', function($value) {
            return \App\Models\Shares::where('slug', $value)->firstOrFail();
        });

        $router->bind('category', function($value) {
            return \App\Models\Category::find($value);
        });

        $router->bind('catalog', function($value) {
            return \App\Models\Goods::where('slug', $value)->firstOrFail();
        });

        $router->bind('work', function($value) {
            return \App\Models\Work::findOrFail($value);
        });


        $router->bind('block', function ($value) {
            return \App\Models\Block::find($value)->firstOrFail();
        });

    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
