<?php

use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOperationsController;
use App\Http\Controllers\AdminUserController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->middleware('throttle:5,1')->name('login.store');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->middleware('auth:admin')->name('logout');
});

Route::prefix('user')
    ->name('user.')
    ->middleware('auth')
    ->controller(UserDashboardController::class)
    ->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/water-monitoring', 'waterMonitoring')->name('water-monitoring');
        Route::get('/water-monitoring/apis/create', 'createSensorApiConnection')->name('water-monitoring.apis.create');
        Route::post('/water-monitoring/apis', 'storeSensorApiConnection')->name('water-monitoring.apis.store');
        Route::get('/water-monitoring/apis/{connection}/edit', 'editSensorApiConnection')->name('water-monitoring.apis.edit');
        Route::put('/water-monitoring/apis/{connection}', 'updateSensorApiConnection')->name('water-monitoring.apis.update');
        Route::delete('/water-monitoring/apis/{connection}', 'deleteSensorApiConnection')->name('water-monitoring.apis.destroy');
        Route::post('/water-monitoring/apis/{connection}/sync', 'syncSensorApiConnection')->middleware('throttle:10,1')->name('water-monitoring.apis.sync');
        Route::get('/water-monitoring/export', 'exportWaterReadings')->name('water-monitoring.export');
        Route::get('/water-monitoring/{reading}', 'viewWaterReading')->name('water-monitoring.view');
        Route::delete('/water-monitoring/{reading}', 'deleteWaterReading')->name('water-monitoring.destroy');
        Route::get('/chemical-kits', 'chemicalKits')->name('chemical-kits.index');
        Route::get('/chemical-kits/create', 'createChemicalKitUsage')->name('chemical-kits.create');
        Route::get('/chemical-kits/{usage}/edit', 'editChemicalUsage')->name('chemical-kits.edit');
        Route::get('/chemical-kits/{usage}', 'viewChemicalUsage')->name('chemical-kits.view');
        Route::post('/chemical-kits', 'storeChemicalUsage')->name('chemical-kits.store');
        Route::put('/chemical-kits/{usage}', 'updateChemicalUsage')->name('chemical-kits.update');
        Route::delete('/chemical-kits/{usage}', 'deleteChemicalUsage')->name('chemical-kits.destroy');
        Route::get('/compliance', 'compliance')->name('compliance');
        Route::get('/audit-report', 'auditReport')->name('audit-report');
        Route::get('/audit-report/export', 'exportAuditReport')->name('audit-report.export');
        Route::get('/schedule', 'schedule')->name('schedule');
        Route::get('/schedule/create', 'createReminder')->name('schedule.create');
        Route::get('/schedule/{reminder}/edit', 'editReminder')->name('schedule.edit');
        Route::get('/schedule/{reminder}', 'viewReminder')->name('schedule.view');
        Route::post('/schedule', 'storeReminder')->name('schedule.store');
        Route::put('/schedule/{reminder}', 'updateReminder')->name('schedule.update');
        Route::delete('/schedule/{reminder}', 'deleteReminder')->name('schedule.destroy');
        Route::get('/reports', 'reports')->name('reports.index');
        Route::get('/reports/export', 'exportAuditReport')->name('reports.export');
        Route::get('/reports/view/{reading?}', 'viewReport')->name('reports.view');
        Route::get('/site-locations', 'siteLocations')->name('site-locations');
        Route::get('/site-locations/create', 'createSite')->name('site-locations.create');
        Route::get('/site-locations/{site}/edit', 'editSite')->name('site-locations.edit');
        Route::get('/site-locations/{site}', 'viewSite')->name('site-locations.view');
        Route::post('/site-locations', 'storeSite')->name('site-locations.store');
        Route::put('/site-locations/{site}', 'updateSite')->name('site-locations.update');
        Route::delete('/site-locations/{site}', 'deleteSite')->name('site-locations.destroy');
        Route::get('/notifications', 'notifications')->name('notifications');
        Route::put('/notifications/read-all', 'markAllNotificationsRead')->name('notifications.read-all');
        Route::put('/notifications/{notification}/read', 'markNotificationRead')->name('notifications.read');
        Route::delete('/notifications/{notification}', 'dismissNotification')->name('notifications.dismiss');
        Route::get('/profile', 'profile')->name('profile');
        Route::put('/profile', 'updateProfile')->name('profile.update');
        Route::get('/settings', 'settings')->name('settings');
        Route::put('/settings', 'updateSettings')->name('settings.update');
        Route::put('/settings/password', 'updatePassword')->name('settings.password');
    });

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/water-usage', 'waterUsage')->name('water-usage');
        Route::get('/chemical-usage', 'chemicalUsage')->name('chemical-usage');
        Route::get('/compliance', 'compliance')->name('compliance');
        Route::get('/reports', 'reports')->name('reports');
    });

    Route::controller(AdminUserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->whereNumber('user')->name('edit');
        Route::get('/{user}', 'show')->whereNumber('user')->name('show');
        Route::put('/{user}', 'update')->whereNumber('user')->name('update');
        Route::delete('/{user}', 'destroy')->whereNumber('user')->name('destroy');
    });
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    $modules = [
        ['key' => 'kit-deliveries', 'path' => 'kit-delivery', 'name' => 'kit-delivery'],
        ['key' => 'subscriptions', 'path' => 'subscriptions', 'name' => 'subscriptions'],
        ['key' => 'subscription-plans', 'path' => 'subscription-plans', 'name' => 'subscription-plans'],
        ['key' => 'invoices', 'path' => 'billing', 'name' => 'billing'],
        ['key' => 'partner-labs', 'path' => 'partner-labs', 'name' => 'partner-labs'],
        ['key' => 'technicians', 'path' => 'technicians', 'name' => 'technicians'],
    ];

    foreach ($modules as $module) {
        Route::get('/'.$module['path'], [AdminOperationsController::class, 'index'])
            ->defaults('module', $module['key'])
            ->name($module['name']);
        Route::get('/'.$module['path'].'/create', [AdminOperationsController::class, 'create'])
            ->defaults('module', $module['key'])
            ->name($module['name'].'.create');
        Route::post('/'.$module['path'], [AdminOperationsController::class, 'store'])
            ->defaults('module', $module['key'])
            ->name($module['name'].'.store');
        Route::get('/'.$module['path'].'/{record}/edit', [AdminOperationsController::class, 'edit'])
            ->whereNumber('record')
            ->defaults('module', $module['key'])
            ->name($module['name'].'.edit');
        Route::get('/'.$module['path'].'/{record}', [AdminOperationsController::class, 'show'])
            ->whereNumber('record')
            ->defaults('module', $module['key'])
            ->name($module['name'].'.show');
        Route::put('/'.$module['path'].'/{record}', [AdminOperationsController::class, 'update'])
            ->whereNumber('record')
            ->defaults('module', $module['key'])
            ->name($module['name'].'.update');
        Route::delete('/'.$module['path'].'/{record}', [AdminOperationsController::class, 'destroy'])
            ->whereNumber('record')
            ->defaults('module', $module['key'])
            ->name($module['name'].'.destroy');
    }

    Route::get('/settings', [AdminAccountController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminAccountController::class, 'updateSettings'])->name('settings.update');
    Route::put('/settings/password', [AdminAccountController::class, 'updatePassword'])->name('settings.password');
    Route::get('/profile', [AdminAccountController::class, 'profile'])->name('profile');
    Route::put('/profile', [AdminAccountController::class, 'updateProfile'])->name('profile.update');
});
