<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'user',
    'as' => 'user.'
], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Frontend\DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\Frontend\ProfileController::class, 'index'])
        ->name('profile');
    Route::put('/profile', [\App\Http\Controllers\Frontend\ProfileController::class, 'update'])
        ->name('profile.update');
    Route::put('/profile-password', [\App\Http\Controllers\Frontend\ProfileController::class, 'updatePassword'])
        ->name('profile-password.update');
});

require __DIR__ . '/auth.php';
