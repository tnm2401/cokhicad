<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use CartHelper;
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
        // Sharing Data With All Views
        view()->composer('*', function($view){
            $view->with([
                'cart' => new CartHelper()
            ]);
        });
        if(session()->get('locale') == null){
            session()->put('locale','vi');
        }
    }
}
