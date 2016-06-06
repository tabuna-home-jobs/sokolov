<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Blade::directive('widget', function ($key,$data =null) {
            return "<?php echo (new \\App\\Services\\Widget\\Widget)->get{$key}; ?>";
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
