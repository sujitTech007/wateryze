<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/industry', 'industry')->name('industry');
    Route::get('/subscription', 'subscription')->name('subscription');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/terms-condition', 'terms')->name('terms');
    Route::get('/login', 'login')->name('login');
    Route::get('/signup', 'signup')->name('signup');
});
