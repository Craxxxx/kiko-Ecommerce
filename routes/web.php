<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

// 1) Redirect root to registration
Route::redirect('/', '/register');

// 2) Registration
Route::view('/register', 'Register')->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// 3) Login
Route::view('/login', 'Login')->name('login');
Route::post('/login', function () {
    return redirect()->route('dashboard');
});

// 4) Dashboard
Route::view('/dashboard', 'Dashboard')->name('dashboard');

// Shop page
Route::view('/shop', 'ShirtCategory')->name('shop');

//static product detail routes no need id
Route::view('/product-detail', 'ProductDetail')->name('product.detail');

//payment page
Route::view('/payment', 'Payment')->name('payment');
