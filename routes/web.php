<?php

use App\Http\Controllers\Admin\AnalysisController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Ecommerce\CartController;
use App\Http\Controllers\Ecommerce\CatalogController;
use App\Http\Controllers\Ecommerce\HomeController;
use App\Http\Controllers\Ecommerce\SingleProductController;
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
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/{product_code}', [CartController::class, 'add_to_cart'])->name('cart.add');
    Route::put('/cart/{cart_id}/{product_code}', [CartController::class, 'change_quantity'])->name('cart.quantity');
    Route::delete('/cart/{product_code}/delete', [CartController::class, 'remove_to_cart'])->name('cart.remove');
    Route::post('/cart/{product_code}/wishlist', [CartController::class, 'move_to_wishlist'])->name('cart.move');
});

//home Apis
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
Route::put('/cart/{cart_id}/{product_code}', [CartController::class, 'change_quantity'])->name('cart.quantity');
Route::get('/catalog/{category_name}', [CatalogController::class, 'catalog_category'])->name('catalog.category');
Route::get('/product/{product_code}', [SingleProductController::class, 'index'])->name('product');


// Admin Users
Route::middleware(['auth:sanctum', 'verified', 'is_admin'])->group(function () {
    //Dashboard Apis
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Orders Apis
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/order-status', [OrderController::class, 'order_status'])->name('order_status');
    Route::get('/order/invoice-print', [PrintController::class, 'print_invoice'])->name('print_invoice');

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
