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
        $this->app->bind('bepc\Repositories\Contracts\CustomerContract', 'bepc\Repositories\Eloquent\EloquentCustomerRepository');
        $this->app->bind('bepc\Repositories\Contracts\BarcodeContract', 'bepc\Repositories\Eloquent\EloquentBarcodeRepository');

        $this->app->bind('bepc\Repositories\Contracts\ProductContract', 'bepc\Repositories\Eloquent\EloquentProductRepository');
        $this->app->bind('bepc\Repositories\Contracts\UserBarcodeContract', 'bepc\Repositories\Eloquent\EloquentUserBarcodeRepository');
        $this->app->bind('bepc\Repositories\Contracts\UserIdCardContract', 'bepc\Repositories\Eloquent\EloquentUserIdCardRepository');
        $this->app->bind('bepc\Repositories\Contracts\UserContactContract', 'bepc\Repositories\Eloquent\EloquentUserContactRepository');
        $this->app->bind('bepc\Repositories\Contracts\UserAddressContract', 'bepc\Repositories\Eloquent\EloquentUserAddressRepository');

        $this->app->bind('bepc\Repositories\Contracts\RecipeContract', 'bepc\Repositories\Eloquent\EloquentRecipeRepository');
        $this->app->bind('bepc\Repositories\Contracts\ItemContract', 'bepc\Repositories\Eloquent\EloquentItemRepository');
        $this->app->bind('bepc\Repositories\Contracts\ItemGroupContract', 'bepc\Repositories\Eloquent\EloquentItemGroupRepository');
        $this->app->bind('bepc\Repositories\Contracts\IngredientContract', 'bepc\Repositories\Eloquent\EloquentIngredientRepository');
        $this->app->bind('bepc\Repositories\Contracts\InventoryLogContract', 'bepc\Repositories\Eloquent\EloquentInventoryLogRepository');
        $this->app->bind('bepc\Repositories\Contracts\SupplierContract' , 'bepc\Repositories\Eloquent\EloquentSupplierRepository');
     $this->app->bind('bepc\Repositories\Contracts\SupplierItemContract' , 'bepc\Repositories\Eloquent\EloquentSupplierItemRepository');
    }
}
