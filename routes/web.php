<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Ecommerce\HomeController;
use App\Http\Controllers\OAuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Facebook Auth
Route::get('/signin-facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('auth.facebook');

Route::get('/callback', [OAuthController::class, 'callback']);

// Google Auth

Route::get('/signin-google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');

Route::get('/callbackGoogle', [OAuthController::class, 'callbackGoogle']);


// Ecommerce Users
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
});

//home Apis
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Users
Route::middleware(['auth:sanctum', 'verified', 'is_admin'])->group(function () {
    //Dashboard Apis
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Products Apis
    Route::get('/products', [ProductController::class, 'index'])->name('products');
});
