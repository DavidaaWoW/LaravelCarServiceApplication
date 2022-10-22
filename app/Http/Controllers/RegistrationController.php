<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class RegistrationController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.profile'));
        }
        $validateFields = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);
        $validateFields = array('id' => uniqid()) + $validateFields;
        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user, true);
            $json = json_encode(array('theme' => "light", 'language' => "ru"));
            Redis::set($user->id, $json);
            return redirect(route('user.profile'));
        } else {
            return redirect(route('user.login'))->withErrors([
                'formError' => 'Ошибка при аутентификации'
            ]);
        }
    }
}
