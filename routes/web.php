<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;

// 1) Redirect root to registration PAG
Route::redirect('/', '/register');

// 2) Registration
Route::view('/register', 'Register')->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// 3) Login
Route::view('/login', 'Login')->name('login.form');
Route::post('/login', [LoginController::class, 'store'])->name('login.process');

// 4) Dashboard MAIN PAGE AFTER LOGIN
Route::view('/dashboard', 'Dashboard')->name('dashboard');


// 5) PRODUCTS
// Shop page (LISTS ALL THE PRODUCTS) ALL PRODUCTS
// Route::view('/shop', 'ShirtCategory')->name('shop');
Route::get('/shop', [ProductController::class, 'index'])
     ->name('shop');
//PRODUCT DETAIL PAGE SINGLE PRODUCT WITH ITS OWN ID
Route::view('/product-detail', 'ProductDetail')->name('product.detail');

// 6) Cart
// Show cart
Route::get('/cart', [CartController::class, 'show'])
     ->middleware('auth')
     ->name('cart.show');
//add product to cart
Route::post('/cart/add', [CartController::class, 'add'])
     ->middleware('auth')
     ->name('cart.add');
Route::get('/payment', [CartController::class, 'paymentPage'])->name('payment.page');
//update item in cart (change quantity)
Route::patch('/cart/item/{id}', [CartItemController::class, 'update'])
     ->name('cart.update')->middleware('auth');
//delete item from cart
Route::delete('/cart/item/{id}', [CartItemController::class, 'destroy'])
     ->name('cart.destroy')->middleware('auth');




//checkout 
Route::post('/checkout', [OrderController::class, 'processCheckout'])->name('checkout.process');

Route::get('/checkout/success', function () {
    return view('order-success');
})->name('checkout.success');
