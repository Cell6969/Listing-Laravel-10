<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login'])
    ->name('admin.login');
Route::get('/admin/forget-password', [\App\Http\Controllers\Admin\AdminAuthController::class, 'passwordRequest'])
    ->name('admin.password.request');

Route::group([
    'middleware' => ['auth', 'user.type:admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])
        ->name('dashboard.index');

    // Profile routes
    Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])
        ->name('profile.index');
    Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class,'store'])
        ->name('profile.store');
    Route::put('/profile-password', [\App\Http\Controllers\Admin\ProfileController::class,'storePassword'])
        ->name('profile-password.store');
});
