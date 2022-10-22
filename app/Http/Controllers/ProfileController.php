<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ProfileController extends Controller
{
    public function setLan($lan)
    {
        if (Auth::check()) {
            $json = json_decode(Redis::get(auth()->user()->id));
            $json->language = $lan;
            Redis::set(auth()->user()->id, json_encode(($json)));
            App::setLocale($lan);
        }
        return view('profile');
    }
    public function setTheme($theme)
    {
        if (Auth::check()) {
            $json = json_decode(Redis::get(auth()->user()->id));
            $json->theme = $theme;
            Redis::set(auth()->user()->id, json_encode(($json)));
        }
        return view('profile');
    }
    public function uploadPDF(Request $request)
    {
        $file = $request->formFile;
        if ($file) {
            $name = $file->getClientOriginalName();
            $type = $file->getMimeType();
            $size = $file->getSize();
            $fp      = fopen($file, 'r');
            $content = fread($fp, $size);
            $content = addslashes($content);
            fclose($fp);

            $user = User::find(auth()->user()->id);
            $user->filename = $name;
            $user->filetype = $type;
            $user->size = $size;
            $user->driversLicencePDF = $content;
            $user->save();
        }
        return view('profile');
    }
    public function downloadPDF()
    {
        $user = User::find(auth()->user()->id);
        $headers = [
            'Content-Type' => $user->filetype,
        ];
        return response()->streamDownload(function () {
            $user = User::find(auth()->user()->id);
            echo $user->driversLicencePDF;
        }, $user->filename, $headers);
    }
}
