@extends('layouts.app')
@section('title', 'Payment')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
@endpush

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="{{ route('dashboard') }}">Home</a>
        <span>></span>
        <a href="{{ route('shop') }}">Shop</a>
        <span>></span>
        <a href="#">Payment</a>
    </div>

    <!-- Shopping Cart Title -->
    <h1 class="cart-title">Payment</h1>

    <!-- Payment Content -->
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="payment-container">
            <!-- Customer Information Side -->
            <div class="customer-info-container">
                <!-- Customer Info Section -->
                <div class="info-section">
                    <h2>Customer Info</h2>
                    <div class="form-group">
                        <label for="email">Email / Phone Number</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email or phone number" required>
                    </div>
                </div>

                <!-- Shipping Address Section -->
                <div class="info-section">
                    <h2>Shipping Address</h2>
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="fullname" id="fullname" placeholder="Enter your full name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" placeholder="Enter your complete address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="notes">Order Notes</label>
                        <textarea name="notes" id="notes" placeholder="Add any special instructions (optional)"></textarea>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="info-section">
                    <h2>Payment Method</h2>
                    <div class="payment-option">
                        <div class="payment-option-header">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M2 8h20M6 16h2M4 12h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2z"
                                      stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>Transfer Virtual Account</div>
                            <span style="margin-left: auto;">></span>
                        </div>
                        <div class="payment-icons">
                            <div class="payment-icon">
                                <img src="{{ asset('images/new-gopay-logo-copy 1.svg') }}" alt="GoPay">
                            </div>
                            <div class="payment-icon">
                                <img src="{{ asset('images/Dana 1.svg') }}" alt="DANA">
                            </div>
                            <div class="payment-icon">
                                <img src="{{ asset('images/logo-ovo 1.svg') }}" alt="OVO">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Side -->
            <div class="payment-details">
                <div class="order-summary">
                    <h2 class="summary-title">Your Order Summary</h2>
                    <div class="cart-items">
                        @foreach ($cartItems as $item)
                            <div class="cart-item">
                                <div class="item-image">
                                    <img src="{{ $item->product->image_url ?? 'https://via.placeholder.com/70x70' }}"
                                         alt="{{ $item->product->name }}">
                                </div>
                                <div class="item-details">
                                    <h3>{{ $item->product->name }} ({{ $item->quantity }})</h3>
                                    <div class="color-option">
                                        <div class="color-circle"></div>
                                        <span>{{ $item->variant ?? 'Default' }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Payment Summary -->
                    <div class="payment-summary">
                        <div class="summary-row">
                            <div>Cart Subtotal:</div>
                            <div>Rp {{ number_format($cartSubtotal, 0, ',', '.') }}</div>
                        </div>
                        <div class="summary-row">
                            <div>Shipping:</div>
                            <div>Rp {{ number_format($shipping, 0, ',', '.') }}</div>
                        </div>
                        <div class="summary-row">
                            <div>Order Total:</div>
                            <div>Rp {{ number_format($total, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <input type="hidden" name="cart_total" value="{{ $total }}">

                    <!-- Checkout Button -->
                    <button type="submit" class="checkout-btn">Check Out</button>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/scroll-animations.js') }}"></script>
@endsection
