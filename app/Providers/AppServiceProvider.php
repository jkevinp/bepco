<?php

namespace bepc\Providers;

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
        $this->app->bind('bepc\Repositories\Contracts\UserContract', 'bepc\Repositories\Eloquent\EloquentUserRepository');
        $this->app->bind('bepc\Repositories\Contracts\BarcodeContract', 'bepc\Repositories\Eloquent\EloquentBarcodeRepository');

        $this->app->bind('bepc\Repositories\Contracts\ProductContract', 'bepc\Repositories\Eloquent\EloquentProductRepository');
        $this->app->bind('bepc\Repositories\Contracts\UserBarcodeContract', 'bepc\Repositories\Eloquent\EloquentUserBarcodeRepository');
        $this->app->bind('bepc\Repositories\Contracts\UserIdCardContract', 'bepc\Repositories\Eloquent\EloquentUserIdCardRepository');
    }
}
