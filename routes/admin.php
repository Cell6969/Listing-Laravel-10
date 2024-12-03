<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [\App\Http\Controllers\Admin\AdminAuthController::class, 'login'])
    ->name('admin.login')->middleware('guest');
Route::get('/admin/forget-password', [\App\Http\Controllers\Admin\AdminAuthController::class, 'passwordRequest'])
    ->name('admin.password.request')->middleware('guest');

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
    Route::put('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'store'])
        ->name('profile.store');
    Route::put('/profile-password', [\App\Http\Controllers\Admin\ProfileController::class, 'storePassword'])
        ->name('profile-password.store');

    //    Hero Routes
    Route::get('/hero', [\App\Http\Controllers\Admin\HeroController::class, 'index'])
        ->name('hero.index');
    Route::put('/hero', [\App\Http\Controllers\Admin\HeroController::class, 'update'])
        ->name('hero.update');

    //    Category Routes
    Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class);

    //    Location Routes
    Route::resource('/location', \App\Http\Controllers\Admin\LocationController::class);
});
