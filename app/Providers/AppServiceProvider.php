<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use Cart;

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
        
//        View::share('category', Category::where('publication_status', 1)->get());
//        View::share('items', Cart::getContent());
        View::composer('*', function ($view) {
            View::share('category', Category::where('publication_status', 1)->get());
            View::share('items', Cart::getContent());
            View::share('GetTotalQuantity', Cart::getTotalQuantity());
            View::share('GetSubTotal', Cart::getSubTotal());
        });
    }
}
