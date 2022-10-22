<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

class ThemeComposer
{

    public function __construct()
    {
    }

    public function compose(ViewView $view)
    {
        if (Auth::check()) {
            $json = json_decode(Redis::get(auth()->user()->id));
            switch ($json->theme) {
                case 'light':
                    View::share('_style', 'light.css');
                    break;
                case 'dark':
                    View::share('_style', 'dark.css');
                    break;
                default:
                    View::share('_style', 'light.css');
                    break;
            }
        }
    }
}
