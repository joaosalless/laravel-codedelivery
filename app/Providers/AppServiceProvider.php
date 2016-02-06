<?php

namespace CodeDelivery\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Dmitrovskiy\IonicPush\PushProcessor', function() {
            return new \Dmitrovskiy\IonicPush\PushProcessor(env('IONIC_APP_ID'), env('IONIC_SECRET_ID'));
        });
    }
}
