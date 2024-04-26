<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

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

// Rute untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk menampilkan halaman login dulu
Route::get('/logindulu', function () {
    return view('logindulu');
});

// Rute untuk menampilkan halaman homesuccess
Route::get('/homesuccess', function () {
    return view('homesuccess');
});

// Rute untuk menampilkan halaman produk
Route::get('/homesuccess', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

// Rute untuk menampilkan halaman login
Route::get('/login', function () {
    return view('login/index');
});

// Rute untuk menampilkan halaman registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Rute untuk proses login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Rute untuk proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk menampilkan detail produk berdasarkan ID
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');

// Rute untuk menampilkan produk berdasarkan kategori
Route::get('/category/{id}', 'ProductController@productsByCategory')->name('products.byCategory');
Route::get('/category/{id}', [App\Http\Controllers\ProductController::class, 'productsByCategory'])
    ->name('products.byCategory');
Route::get('/homesuccess', [ProductController::class, 'index'])->name('homesuccess');

// Rute untuk menampilkan kategori produk
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

// Rute untuk menampilkan keranjang belanja
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');

// Rute untuk pencarian produk
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

// Rute untuk proses checkout
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::post('/checkout/process', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
Route::post('/checkout/checkout-process', [CheckoutController::class, 'checkoutProcess'])->name('checkout.checkoutProcess');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'checkoutProcess'])->name('checkout.process');

// Rute untuk menampilkan halaman sukses pembayaran
Route::get('/payment-success', function() {
    return view('paymentSuccess');
})->name('paymentSuccess');

