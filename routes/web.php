<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::name('user.')->group(function () {
    Route::view('/profile', 'profile')->middleware('auth')->name('profile');
    Route::get('/dynamic1', 'App\Http\Controllers\BrandController@getBrands')->middleware('auth')->name('dynamic1');
    Route::get('/admin', 'App\Http\Controllers\BrandController@getBrandsAdmin')->middleware('auth')->name('admin');
    Route::get('/admin2/{id}', 'App\Http\Controllers\CarController@getCarsAdmin')->middleware('auth')->name('admin2');
    Route::get('/dynamic2', 'App\Http\Controllers\CarController@getCars')->middleware('auth')->name('dynamic2');
    Route::view('/about', 'about')->middleware('auth')->name('about');
    Route::view('/contacts', 'contacts')->middleware('auth')->name('contacts');

    Route::post('/admin/update', [BrandController::class, 'editBrand'])->middleware('auth')->name('brandEdit');
    Route::post('/admin/post', [BrandController::class, 'addBrand'])->middleware('auth')->name('brandPost');
    Route::get('/admin/delete/all', [BrandController::class, 'removeAllBrands'])->middleware('auth')->name('brandRemoveAll');
    Route::get('/admin/delete/{id}', [BrandController::class, 'removeBrand'])->middleware('auth')->name('brandRemove');

    Route::post('/admin2/update/{brandid}', [CarController::class, 'editCar'])->middleware('auth')->name('carEdit');
    Route::post('/admin2/post/{brandid}', [CarController::class, 'addCar'])->middleware('auth')->name('carPost');
    Route::get('/admin2/delete/{brandid}/all', [CarController::class, 'removeAllCars'])->middleware('auth')->name('carRemoveAll');
    Route::get('/admin2/delete/{brandid}/{carid}', [CarController::class, 'removeCar'])->middleware('auth')->name('carRemove');

    Route::get('/profile/lan/{lan}', [ProfileController::class, 'setLan'])->middleware('auth')->name('setLan');
    Route::get('/profile/theme/{theme}', [ProfileController::class, 'setTheme'])->middleware('auth')->name('setTheme');
    Route::post('/profile/upload', [ProfileController::class, 'uploadPDF'])->middleware('auth')->name('uploadPDF');
    Route::get('/profile/download', [ProfileController::class, 'downloadPDF'])->middleware('auth')->name('downloadPDF');

    Route::get('/statistics', [StatisticsController::class, 'makeChart'])->middleware('auth')->name('statistics');
    Route::post('/statistics/generate', [StatisticsController::class, 'generateRand'])->middleware('auth')->name('generateRand');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('user.profile'));
        }
        return view('login');
    })->name('login');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('user.profile'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', [RegistrationController::class, 'save']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('user.login'));
    })->name('logout');
});
