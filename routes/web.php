<?php

use App\Http\Controllers\Admin\AnalysisController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
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

    //Orders Apis
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    //Products Apis
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product_code}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/update', [ProductController::class, 'update'])->name('products.update');

    //categories Apis
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('/categories/{category_id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::put('/categories/update', [CategoryController::class, 'update'])->name('categories.update');

    //brands Apis
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
    Route::delete('/brands/{category_id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    Route::put('/brands/update', [BrandController::class, 'update'])->name('brands.update');
    //analysis Apis
    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis');

    //users Apis
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'ban'])->name('user.ban');
});
