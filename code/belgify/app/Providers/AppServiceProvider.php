<?php

namespace App\Providers;

use App\Event;
use Auth;
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
        view()->composer('partials.search', function($view){

            $view->with('terms', Event::all());
        });

        view()->composer(['partials.nav', 'profile.show', 'partials.dashboard.*', 'events.*'], function($view){

            $view->with('auth', Auth::user());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
