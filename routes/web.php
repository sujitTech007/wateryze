<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/industry', 'industry')->name('industry');
    Route::get('/subscription', 'subscription')->name('subscription');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/terms-condition', 'terms')->name('terms');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('signup');
    Route::post('/signup', [AuthController::class, 'register'])->middleware('throttle:5,1')->name('signup.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('user')
    ->name('user.')
    ->middleware('auth')
    ->controller(UserDashboardController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/water-monitoring', 'waterMonitoring')->name('water-monitoring');
        Route::get('/chemical-kits', 'chemicalKits')->name('chemical-kits.index');
        Route::get('/chemical-kits/create', 'createChemicalKitUsage')->name('chemical-kits.create');
        Route::get('/compliance', 'compliance')->name('compliance');
        Route::get('/audit-report', 'auditReport')->name('audit-report');
        Route::get('/schedule', 'schedule')->name('schedule');
        Route::get('/reports', 'reports')->name('reports.index');
        Route::get('/reports/view', 'viewReport')->name('reports.view');
        Route::get('/reports/edit', 'editReport')->name('reports.edit');
        Route::get('/site-locations', 'siteLocations')->name('site-locations');
        Route::get('/notifications', 'notifications')->name('notifications');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/settings', 'settings')->name('settings');
    });
