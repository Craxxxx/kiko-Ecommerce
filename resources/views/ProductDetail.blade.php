@extends('layouts.app')
@section('title', 'ProductDetail')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/Detail.css') }}">
@endpush

@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="index.html">Home</a>
        <span>></span>
        <a href="shop.html">Shop</a>
        <span>></span>
        <a href="product-detail.html">Detail</a>
    </div>

    <!-- Product Detail Content -->
    <div class="product-detail-container">
        <!-- Product Images Section -->
        <div class="product-images">
            <div class="product-main-image">
                <img src="{{ asset('images/shirt.svg') }}" alt="Kikopili T-Shirt">
            </div>
            <div class="product-thumbnails">
                <div class="product-thumbnail">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Thumbnail 1">
                </div>
                <div class="product-thumbnail">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Thumbnail 2">
                </div>
                <div class="product-thumbnail">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Thumbnail 3">
                </div>
            </div>
        </div>

        <!-- Product Information Section -->
        <div class="product-info">
            <h1 class="product-title">Kikopili (2)</h1>
            
            <div class="color-options">
                <p class="option-label">Select Colors</p>
                <div class="color-list">
                    <div class="color-option olive selected"></div>
                    <div class="color-option dark-green"></div>
                    <div class="color-option navy"></div>
                </div>
            </div>
            
            <div class="size-options">
                <p class="option-label">Choose Size</p>
                <div class="size-list">
                    <div class="size-option">S</div>
                    <div class="size-option">M</div>
                    <div class="size-option selected">L</div>
                    <div class="size-option">XL</div>
                    <div class="size-option">2XL</div>
                    <div class="size-option">3XL</div>
                    <div class="size-option">4XL</div>
                </div>
            </div>
            
            <div class="quantity-selector">
                <button class="quantity-btn" id="decrease-quantity">-</button>
                <input type="text" class="quantity-input" value="1" id="quantity" readonly>
                <button class="quantity-btn" id="increase-quantity">+</button>
            </div>
            
            <button class="add-to-cart-btn">Add to Cart</button>
        </div>
    </div>

    <script>
        // Quantity selector functionality
        document.addEventListener('DOMContentLoaded', function() {
            const decreaseBtn = document.getElementById('decrease-quantity');
            const increaseBtn = document.getElementById('increase-quantity');
            const quantityInput = document.getElementById('quantity');
            
            decreaseBtn.addEventListener('click', function() {
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantityInput.value = quantity - 1;
                }
            });
            
            increaseBtn.addEventListener('click', function() {
                let quantity = parseInt(quantityInput.value);
                quantityInput.value = quantity + 1;
            });
            
            // Color selection
            const colorOptions = document.querySelectorAll('.color-option');
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    colorOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
            
            // Size selection
            const sizeOptions = document.querySelectorAll('.size-option');
            sizeOptions.forEach(option => {
                option.addEventListener('click', function() {
                    sizeOptions.forEach(opt => opt.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
        });
    </script>
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
@endsection
