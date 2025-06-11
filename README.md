## KIKOPILI E-Commerce Application

A simplified Laravel-based e-commerce demo for custom shirt ordering. Users can register, log in, browse products, add to cart, update quantities, proceed to checkout, and view an order-success page. All cart interactions are AJAX-driven for a seamless UX.

---

### 🚀 Features

* **User Authentication**

  * Registration & login (Laravel Auth)
  * Redirect to dashboard after login

* **Product Catalog**

  * Dynamic listing from `products` table
  * Chunked display (3 per row)
  * “Add to Cart” button with AJAX

* **Shopping Cart**

  * Persisted per user in `carts` / `cart_items` tables
  * Increment/decrement quantities and removal via AJAX
  * Live updates of cart badge, line subtotals, and totals

* **Checkout Flow**

  * Payment page with customer info, shipping address, and payment method
  * Order processing captures order data in session and clears the cart
  * Order-success page displaying order summary and customer info

---

### 📦 Requirements

* PHP ≥ 8.0
* Composer
* MySQL (or compatible)
* Node.js & npm (optional, for assets)

---

### 🔧 Installation

1. **Clone the repo**

   ```bash
   git clone https://github.com/yourorg/kikopili.git
   cd kikopili
   ```

2. **Install dependencies**

   ```bash
   composer install
   ```

3. **Environment setup**

   ```bash
   cp .env.example .env
   # Update .env with your DB credentials and APP_URL
   php artisan key:generate
   ```

4. **Database migrations**

   ```bash
   php artisan migrate
   ```

5. **(Optional) Seed sample products**

   ```bash
   php artisan db:seed --class=ProductSeeder
   ```

6. **Serve the app**

   ```bash
   php artisan serve
   ```

---

### 🗄️ Database Structure

* **users** (`id`, `name`, `email`, `password`, timestamps)
* **products** (`id`, `name`, `description`, `price`, `image_url`, `stock_quantity`, timestamps)
* **carts** (`id`, `user_id`, timestamps)
* **cart\_items** (`id`, `cart_id`, `product_id`, `quantity`, timestamps)
* **orders** & **order\_items** (optional for persistence)

---

### 🛠️ Key Code Components

#### Models & Relationships

* **User** `hasOne` Cart, `hasMany` Orders
* **Product** `hasMany` CartItem / OrderItem
* **Cart** `belongsTo` User, `hasMany` CartItem
* **CartItem** `belongsTo` Cart & Product
* **Order** `belongsTo` User, `hasMany` OrderItem

#### Controllers

* **RegisterController**: handles registration
* **LoginController**: handles login/logout
* **ProductController\@index/show**: catalog & product detail
* **CartController\@add/show/paymentPage**: manage cart & payment view
* **CartItemController\@update/destroy**: AJAX quantity & removal
* **OrderController\@processCheckout/successPage**: finalize order & success screen

#### AJAX Scripts

* **public/js/cart.js**: intercepts “Add to Cart”
* **public/js/cart-action.js**: intercepts “+”, “–”, and remove in cart
* All use **Axios** and dynamically update badge and totals

---

### 📂 Views

* **`layouts/app.blade.php`**: base layout with navbar & footer partials
* **`partials/navbar.blade.php`**: cart badge & navigation
* **Auth**: `register.blade.php`, `login.blade.php`
* **Main**: `dashboard.blade.php`
* **Shop**: `shop.blade.php`
* **Cart**: `cart.blade.php`
* **Payment**: `payment.blade.php`
* **Success**: `order-success.blade.php`

---

### ⚙️ Routes Overview

```php
// Auth
Route::get('/', fn()=>redirect('register'));
Route::view('/register','register')->name('register.form');
Route::post('/register','RegisterController@store')->name('register.store');
Route::view('/login','login')->name('login.form');
Route::post('/login','LoginController@store')->name('login.process');
Route::post('/logout','LoginController@destroy')->name('logout');

// Dashboard
Route::view('/dashboard','dashboard')->name('dashboard')->middleware('auth');

// Products
Route::get('/shop','ProductController@index')->name('shop');
Route::get('/product/{id}','ProductController@show')->name('product.detail');

// Cart
Route::get('/cart','CartController@show')->name('cart.show')->middleware('auth');
Route::post('/cart/add','CartController@add')->name('cart.add')->middleware('auth');
Route::patch('/cart/item/{id}','CartItemController@update')->name('cart.update')->middleware('auth');
Route::delete('/cart/item/{id}','CartItemController@destroy')->name('cart.destroy')->middleware('auth');

// Checkout
Route::post('/checkout','OrderController@processCheckout')->name('checkout.process');
Route::get('/checkout/success','OrderController@successPage')->name('checkout.success');
```

---

### 🚀 Usage

1. **Register** a new account
2. **Login** to access dashboard
3. **Browse** the shop and click **“+”** to add items
4. **Cart** page shows live updates for quantity, price, and badge
5. **Proceed to Payment**, fill in details, and **Check Out**
6. **Order Success** summarizes your order and customer info

---

### 💡 Future Enhancements

* Persistent **order** storage in database
* Real **payment gateway** integration (Stripe, Midtrans)
* Email **order confirmations**
* **Admin panel** for product management
* **Pagination**, **search**, and **filters** on shop page

---

Thank you for using **KIKOPILI**! Feel free to extend, refactor, or integrate new features. Enjoy coding!
