<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\helper\Cart;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with([
                'cart'=>new Cart,
                'category'=>Category::where('status',1)->get(),
                ]);
            });
    }
}
