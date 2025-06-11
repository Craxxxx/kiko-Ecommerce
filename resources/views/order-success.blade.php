
@extends('layouts.app')
@section('title', 'order-success')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/order-success.css') }}">
@endpush

@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="dashboard.html">Home</a> &gt;
        <a href="shop.html">Shop</a> &gt;
        <a href="cart.html">Cart</a> &gt;
        <a href="payment.html">Payment</a> &gt;
        <a href="order-success.html">Order Complete</a>
    </div>

    @php $data = session('orderData'); @endphp
    <!-- Success Content -->
    <div class="success-container">
    <div class="success-header">
        <h1 class="success-title">Order Successful!</h1>
        <p class="success-message">Thank you, {{ $data['fullname'] ?? 'Customer' }}. Your order has been placed.</p>
    </div>

    <div class="order-details">
        <h2>Order Details</h2>
        <div class="order-info">
            <div class="info-row"><div class="info-label">Order Number:</div><div class="info-value">{{ $data['order_number'] }}</div></div>
            <div class="info-row"><div class="info-label">Order Date:</div><div class="info-value">{{ \Carbon\Carbon::now()->toFormattedDateString() }}</div></div>
            <div class="info-row"><div class="info-label">Payment Method:</div><div class="info-value">{{ $data['payment_method'] }}</div></div>
        </div>

        <div class="order-items">
            @foreach ($data['cartItems'] as $item)
                <div class="order-item">
                    <div class="item-image"><img src="{{ $item['image'] }}" alt="Product"></div>
                    <div class="item-details">
                        <h3>{{ $item['name'] }}</h3>
                        <p class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                    </div>
                    <div class="item-quantity">x{{ $item['quantity'] }}</div>
                </div>
            @endforeach

            <div class="order-summary">
                <div class="summary-row"><div class="summary-label">Subtotal:</div><div class="summary-value">Rp {{ number_format($data['subtotal'], 0, ',', '.') }}</div></div>
                <div class="summary-row"><div class="summary-label">Shipping:</div><div class="summary-value">Rp {{ number_format($data['shipping'], 0, ',', '.') }}</div></div>
                <div class="summary-row summary-total"><div class="summary-label">Total:</div><div class="summary-value">Rp {{ number_format($data['total'], 0, ',', '.') }}</div></div>
            </div>
        </div>
    </div>

    <div class="customer-info">
        <h2>Customer Information</h2>
        <div class="info-block">
            <h3>Shipping Address</h3>
            <p>{{ $data['fullname'] }}</p>
            <p>{{ $data['address'] }}</p>
        </div>
    </div>

    <div class="continue-shopping">
        <a href="{{ route('shop') }}" class="shop-more-btn">Continue Shopping</a>
    </div>
</div>

    <script>
        // Get the current date
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('orderDate').textContent = today.toLocaleDateString('en-US', options);
        
        document.getElementById('orderNumber').textContent = randomOrderNum;
        
        // You would normally populate these fields with data from session storage or API
        // This is just placeholder code
        if (orderData.customerName) {
            document.getElementById('shippingName').textContent = orderData.customerName;
            document.getElementById('billingName').textContent = orderData.customerName;
        }
        if (orderData.address) {
            document.getElementById('shippingAddress1').textContent = orderData.address;
            document.getElementById('billingAddress1').textContent = orderData.address;
        }
        // More fields would be populated here in a real implementation
    </script>
@endsection

    

