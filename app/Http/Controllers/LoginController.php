<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.profile'));
        }
        $formFields = $request->only(['email', 'password']);
        if (Auth::attempt($formFields, true)) {

            return redirect(route('user.profile'));
        } else {
            return redirect(route('user.login'))->withErrors([
                'email' => 'Failed to authenticate'
            ]);
        }
    }
}
