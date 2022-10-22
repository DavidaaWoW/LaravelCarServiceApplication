<?php

namespace App\Providers;

use App\Http\Controllers\StatisticsController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;


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
        View::composer('profile', function ($view) {
            $user = User::find(auth()->user()->id);
            if ($user->size) {
                $view->with('licenceBlock', "null");
            } else {
                $view->with('licenceBlock', "hidden");
            }
        });
    }
}
