<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
Route::view('/cart', 'Cart')->name('cart');
//add product to cart
Route::post('/cart/add', [CartController::class, 'add'])
     ->middleware('auth')
     ->name('cart.add');

//payment page
Route::view('/payment', 'Payment')->name('payment');
