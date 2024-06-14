<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware("auth:sanctum")->group(function () {
    Route::get('products', [ProductController::class, 'findAll']);
    Route::get('categories', [CategoryController::class, 'findAll']);
    Route::get('products/{id}', [ProductController::class, 'productsByCategory']);
    Route::get('/cart', [CartController::class, 'getCart']);
    Route::patch('/cart/{id}', [CartController::class, 'updateCart']);
    Route::delete('/cart/{id}', [CartController::class, 'removeFromCart']);
    Route::post('/cart', [CartController::class, 'addToCart']);


    Route::get('/wishlist', [WishlistController::class, 'getWishlist']);
    Route::post('/wishlist', [WishlistController::class, 'addToWishList']);
    Route::delete('/wishlist', [WishlistController::class, 'removeFromWishlist']);
    Route::post('checkout', [CheckoutController::class, 'checkoutProcess']);
});


Route::post('/auth/login', [AuthController::class, "login"]);
Route::post('/auth/register', [AuthController::class, "register"]);
