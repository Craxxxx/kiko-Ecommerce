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

    @if($cartItems->isEmpty())
      <div class="cart-empty">
        <h2>Your cart is empty</h2>
        <p>Looks like you haven't added any products yet.</p>
        <a href="{{ route('shop') }}" class="shop-now-btn">Shop Now</a>
      </div>
    @else
      <div class="cart-items">
        @foreach($cartItems as $item)
          @php
            $product = $item->product;
            $subtotal = $product->price * $item->quantity;
          @endphp

          <div class="cart-item">
            <div class="cart-item-image">
              <img src="{{ asset('productImg/'.$product->image_url.'.svg') }}"
                   alt="{{ $product->name }}">
            </div>

            <div class="cart-item-details">
              <h3 class="cart-item-name">{{ $product->name }}</h3>
              {{-- you can show color/size if stored --}}
              <div class="cart-item-price">
                ${{ number_format($product->price,2) }}
              </div>
            </div>

            <div class="cart-item-quantity">
              {{-- Decrease --}}
              <form method="POST" class="cart-update-form" action="{{ route('cart.update', $item->id) }}" data-id="{{ $item->id }}" data-action="decrease">

                @csrf @method('PATCH')
                <input type="hidden" name="change" value="-1">
                <button class="quantity-btn">–</button>
              </form>

              <input type="text" class="quantity-input"
                     value="{{ $item->quantity }}" readonly>

              {{-- Increase --}}
              <form method="POST" class="cart-update-form" action="{{ route('cart.update', $item->id) }}" data-id="{{ $item->id }}" data-action="increase">


                @csrf @method('PATCH')
                <input type="hidden" name="change" value="1">
                <button class="quantity-btn">+</button>
              </form>
            </div>

            <div class="cart-item-subtotal">
              ${{ number_format($subtotal,2) }}
            </div>

            {{-- Remove --}}
            <form method="POST" class="cart-remove-form" action="{{ route('cart.destroy', $item->id) }}" data-id="{{ $item->id }}">

              @csrf @method('DELETE')
              <button class="remove-item">&times;</button>
            </form>
          </div>
        @endforeach
      </div>

      {{-- Summary --}}
      @php
        $subtotal = $cartItems->sum(fn($i)=>$i->quantity * $i->product->price);
        $total    = $subtotal + $shipping;
      @endphp
      <div class="cart-summary">
        <div class="summary-row summary-subtotal">
          <div>Subtotal</div>
          <div class="summary-value">${{ number_format($subtotal,2) }}</div>
        </div>
        <div class="summary-row summary-shipping">
          <div>Shipping</div>
          <div>${{ number_format($shipping,2) }}</div>
        </div>
        <div class="summary-row summary-total total">
          <div>Total</div>
          <div class="summary-value">${{ number_format($total,2) }}</div>
        </div>
      </div>

      <div class="cart-actions">
        <a href="{{ route('shop') }}" class="btn btn-outline">Continue Shopping</a>
        <a href="" class="btn btn-primary">Proceed to Checkout</a>
      </div>
    @endif
  </div>



@endsection
