<?php

namespace app\Services\orchid\seo\Providers;

use Illuminate\Support\ServiceProvider;

class SEOServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Resources/views' => base_path('resources/views/vendor/seo'),
            //    __DIR__ . '/../Models/SEO.php' => app_path('/Models/SEO.php'),
            __DIR__.'/../Database/Migrations/' => database_path('migrations'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'seo');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        /*
        $this->app->bind('seo', function () {
            return new \App\Models\SEO();
        });

        $this->app->alias('seo', 'App\Models\SEO');
        */
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
        //   return ['seo'];
    }
}
