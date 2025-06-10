@extends('layouts.app')
@section('title', 'Cart')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endpush

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="index.html">Home</a>
        <span>></span>
        <a href="shop.html">Shop</a>
        <span>></span>
        <a href="cart.html">Cart</a>
    </div>

    <!-- Cart Content -->
    <div class="cart-container">
        <h1 class="cart-title">SHOPPING CART</h1>
        
        <!-- Empty Cart Message (initially hidden, shown via JavaScript if cart is empty) -->
        <div class="cart-empty" style="display: none;">
            <h2>Your cart is empty</h2>
            <p>Looks like you haven't added any products to your cart yet.</p>
            <a href="shop.html" class="shop-now-btn">Shop Now</a>
        </div>
        
        <!-- Cart Items (populated via JavaScript) -->
        <div class="cart-items">
            <!-- Cart items will be loaded here from localStorage -->
        </div>
        
        <!-- Cart Summary -->
        <div class="cart-summary">
            <div class="summary-row summary-subtotal">
                <div>Subtotal</div>
                <div class="summary-value">$0.00</div>
            </div>
            <div class="summary-row">
                <div>Shipping</div>
                <div>$10.00</div>
            </div>
            <div class="summary-row summary-total total">
                <div>Total</div>
                <div class="summary-value">$10.00</div>
            </div>
        </div>
        
        <!-- Cart Actions -->
        <div class="cart-actions" style="text-align: right; margin-top: 30px;">
            <a href="shop.html" class="btn" style="display: inline-block; background-color: white; color: black; border: 1px solid black; padding: 12px 30px; text-decoration: none; margin-right: 15px;">Continue Shopping</a>
            <a href="payment.html" class="btn" style="display: inline-block; background-color: black; color: white; padding: 12px 30px; text-decoration: none;">Proceed to Checkout</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadCartItems();
        });

        function loadCartItems() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItemsContainer = document.querySelector('.cart-items');
            const cartEmptyMessage = document.querySelector('.cart-empty');
            const cartSummary = document.querySelector('.cart-summary');
            
            if (cart.length === 0) {
                // If cart is empty, show empty message and hide summary
                if (cartEmptyMessage) {
                    cartEmptyMessage.style.display = 'block';
                }
                if (cartSummary) {
                    cartSummary.style.display = 'none';
                }
                if (cartItemsContainer) {
                    cartItemsContainer.innerHTML = '';
                }
                return;
            }
            
            // If cart has items, hide empty message and show summary
            if (cartEmptyMessage) {
                cartEmptyMessage.style.display = 'none';
            }
            if (cartSummary) {
                cartSummary.style.display = 'block';
            }
            
            // Clear existing items
            if (cartItemsContainer) {
                cartItemsContainer.innerHTML = '';
                
                // Add each item to the cart
                cart.forEach((item, index) => {
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item';
                    
                    const subtotal = (parseFloat(item.price) * item.quantity).toFixed(2);
                    
                    cartItem.innerHTML = `
                        <div class="cart-item-image">
                            <img src="${item.image}" alt="${item.name}">
                        </div>
                        <div class="cart-item-details">
                            <h3 class="cart-item-name">${item.name}</h3>
                            <div class="cart-item-color">
                                <div class="color-circle" style="background-color: #000;"></div>
                                <span>Black</span>
                            </div>
                            <div class="cart-item-size">
                                <span>Size: M</span>
                            </div>
                            <div class="cart-item-price">$${item.price}</div>
                        </div>
                        <div class="cart-item-quantity">
                            <button class="quantity-btn decrease-btn" data-index="${index}">-</button>
                            <input type="text" class="quantity-input" value="${item.quantity}" readonly>
                            <button class="quantity-btn increase-btn" data-index="${index}">+</button>
                        </div>
                        <div class="cart-item-subtotal">$${subtotal}</div>
                        <button class="remove-item" data-index="${index}">&times;</button>
                    `;
                    
                    cartItemsContainer.appendChild(cartItem);
                });
                
                // Add event listeners for quantity buttons and remove buttons
                addCartEventListeners();
                
                // Update summary
                updateCartSummary();
            }
        }
        
        function addCartEventListeners() {
            // Increase quantity buttons
            const increaseButtons = document.querySelectorAll('.increase-btn');
            increaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    updateItemQuantity(index, 1);
                });
            });
            
            // Decrease quantity buttons
            const decreaseButtons = document.querySelectorAll('.decrease-btn');
            decreaseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    updateItemQuantity(index, -1);
                });
            });
            
            // Remove item buttons
            const removeButtons = document.querySelectorAll('.remove-item');
            removeButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const index = this.getAttribute('data-index');
                    removeCartItem(index);
                });
            });
        }
        
        function updateItemQuantity(index, change) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            if (cart[index]) {
                cart[index].quantity += change;
                
                // Remove item if quantity is 0 or less
                if (cart[index].quantity <= 0) {
                    cart.splice(index, 1);
                }
                
                // Save updated cart
                localStorage.setItem('cart', JSON.stringify(cart));
                
                // Reload cart items
                loadCartItems();
                
                // Update cart count
                updateCartCount();
            }
        }
        
        function removeCartItem(index) {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            
            if (cart[index]) {
                cart.splice(index, 1);
                
                // Save updated cart
                localStorage.setItem('cart', JSON.stringify(cart));
                
                // Reload cart items
                loadCartItems();
                
                // Update cart count
                updateCartCount();
            }
        }
        
        function updateCartSummary() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const subtotalElement = document.querySelector('.summary-subtotal .summary-value');
            const totalElement = document.querySelector('.summary-total .summary-value');
            
            if (subtotalElement && totalElement) {
                // Calculate subtotal
                const subtotal = cart.reduce((total, item) => {
                    return total + (parseFloat(item.price) * item.quantity);
                }, 0);
                
                // Fixed shipping cost of $10
                const shipping = 10;
                
                // Calculate total
                const total = subtotal + shipping;
                
                // Update elements
                subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
                totalElement.textContent = `$${total.toFixed(2)}`;
            }
        }
        
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            
            // Check if cart count element exists
            let cartCountElement = document.querySelector('.cart-count');
            
            if (!cartCountElement) {
                // Create cart count element if it doesn't exist
                cartCountElement = document.createElement('span');
                cartCountElement.className = 'cart-count';
                cartCountElement.style.position = 'absolute';
                cartCountElement.style.top = '-8px';
                cartCountElement.style.right = '-8px';
                cartCountElement.style.backgroundColor = 'red';
                cartCountElement.style.color = 'white';
                cartCountElement.style.borderRadius = '50%';
                cartCountElement.style.width = '20px';
                cartCountElement.style.height = '20px';
                cartCountElement.style.display = 'flex';
                cartCountElement.style.justifyContent = 'center';
                cartCountElement.style.alignItems = 'center';
                cartCountElement.style.fontSize = '12px';
                
                // Add to cart icon
                const cartIcon = document.querySelector('.nav-icons a:first-child');
                cartIcon.style.position = 'relative';
                cartIcon.appendChild(cartCountElement);
            }
            
            // Update count
            cartCountElement.textContent = totalItems;
            
            // Show/hide based on count
            if (totalItems === 0) {
                cartCountElement.style.display = 'none';
            } else {
                cartCountElement.style.display = 'flex';
            }
        }
    </script>

@endsection
