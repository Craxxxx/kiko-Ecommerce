<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIKOPILI - Payment</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            position: sticky;
            top: 0;
            width: 100%;
            background-color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .nav-logo {
            font-size: 32px;
            font-weight: 700;
            font-family: 'Abhaya Libre', serif;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #000;
            font-weight: 500;
            font-size: 18px;
            font-family: 'Abhaya Libre', serif;
        }

        .nav-links a:hover {
            text-decoration: underline;
        }

        .nav-icons {
            display: flex;
            gap: 20px;
        }

        .icon-link {
            color: #000;
            font-size: 24px;
        }

        /* Breadcrumb Styles */
        .breadcrumb {
            display: flex;
            align-items: center;
            padding: 20px 40px;
            gap: 10px;
        }

        .breadcrumb a {
            color: #000;
            text-decoration: none;
            font-family: 'Abhaya Libre', serif;
        }

        /* Cart Page Styles */
        .cart-title {
            font-family: 'Abhaya Libre', serif;
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 40px;
            padding: 0 40px;
        }

        .payment-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .customer-info-container {
            flex: 1;
            min-width: 300px;
        }

        .info-section {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .info-section h2 {
            font-family: 'Abhaya Libre', serif;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Inter', sans-serif;
        }

        .form-group textarea {
            height: 100px;
            resize: none;
        }

        .payment-details {
            flex: 1;
            min-width: 300px;
        }

        .order-summary {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .cart-items {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            position: relative;
        }

        .item-image {
            width: 70px;
            height: 70px;
            background-color: #e9e5d6;
            border-radius: 5px;
            overflow: hidden;
            margin-right: 15px;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details h3 {
            font-family: 'Abhaya Libre', serif;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .item-details .color-option {
            display: flex;
            align-items: center;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .color-circle {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background-color: #000;
            margin-right: 5px;
        }

        .item-details .quantity {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            border: none;
            cursor: pointer;
        }

        .quantity-value {
            margin: 0 10px;
        }

        .remove-item {
            position: absolute;
            right: 10px;
            top: 10px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 20px;
            color: #aaa;
        }

        .payment-summary {
            margin-top: 20px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .summary-row:last-child {
            border-bottom: none;
            font-weight: 700;
        }

        .payment-methods {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .payment-methods h2 {
            font-family: 'Abhaya Libre', serif;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .payment-option {
            margin-bottom: 15px;
        }

        .payment-option-header {
            display: flex;
            align-items: center;
            padding-bottom: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .payment-icons {
            display: flex;
            gap: 15%;
            margin-top: 10px;
            margin-left: 30px;
        }

        .payment-icon {
            width: 60px;
            height: 30px;
            background-color: #f0f0f0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #333;
        }

        /* Newsletter Section */
        .newsletter-section {
            background-color: #000;
            color: #fff;
            padding: 40px 20px;
            text-align: center;
            margin-top: 60px;
        }

        .newsletter-title {
            font-family: 'Abhaya Libre', serif;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 5px 0 0 5px;
        }

        .newsletter-btn {
            padding: 12px 25px;
            background-color: #fff;
            color: #000;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-weight: 600;
        }

        /* Footer */
        .footer {
            padding: 60px 40px;
            background-color: #f9f9f9;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-logo {
            font-family: 'Abhaya Libre', serif;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .footer-description {
            max-width: 300px;
            margin-bottom: 20px;
        }

        .footer-section {
            margin-bottom: 30px;
        }

        .footer-title {
            font-family: 'Abhaya Libre', serif;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .footer-link {
            display: block;
            margin-bottom: 10px;
            color: #000;
            text-decoration: none;
        }

        .footer-contact {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .footer-contact-icon {
            margin-right: 10px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .footer-social-icon {
            width: 40px;
            height: 40px;
            background-color: #000;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .payment-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Sticky Navigation Bar -->
    <nav class="navbar">
        <div class="nav-logo">KIKOPILI</div>
        <div class="nav-links">
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="#">Brands</a>
            <a href="{{ route('shop') }}">Shop</a>
        </div>
        <div class="nav-icons">
            <a href="#" class="icon-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.375 20.25C9.375 20.6208 9.26503 20.9834 9.059 21.2917C8.85298 21.6 8.56014 21.8404 8.21753 21.9823C7.87492 22.1242 7.49792 22.1613 7.1342 22.089C6.77049 22.0166 6.4364 21.838 6.17417 21.5758C5.91195 21.3136 5.73337 20.9795 5.66103 20.6158C5.58868 20.2521 5.62581 19.8751 5.76773 19.5325C5.90964 19.1899 6.14996 18.897 6.45831 18.691C6.76665 18.485 7.12916 18.375 7.5 18.375C7.99728 18.375 8.47419 18.5725 8.82582 18.9242C9.17745 19.2758 9.375 19.7527 9.375 20.25ZM17.25 18.375C16.8792 18.375 16.5166 18.485 16.2083 18.691C15.9 18.897 15.6596 19.1899 15.5177 19.5325C15.3758 19.8751 15.3387 20.2521 15.411 20.6158C15.4834 20.9795 15.662 21.3136 15.9242 21.5758C16.1864 21.838 16.5205 22.0166 16.8842 22.089C17.2479 22.1613 17.6249 22.1242 17.9675 21.9823C18.3101 21.8404 18.603 21.6 18.809 21.2917C19.015 20.9834 19.125 20.6208 19.125 20.25C19.125 19.7527 18.9275 19.2758 18.5758 18.9242C18.2242 18.5725 17.7473 18.375 17.25 18.375ZM22.0753 7.08094L19.5169 15.3966C19.3535 15.9343 19.0211 16.4051 18.569 16.739C18.1169 17.0729 17.5692 17.2521 17.0072 17.25H7.77469C7.2046 17.2482 6.65046 17.0616 6.1953 16.7183C5.74015 16.3751 5.40848 15.8936 5.25 15.3459L2.04469 4.125H1.125C0.82663 4.125 0.54048 4.00647 0.329505 3.7955C0.118526 3.58452 0 3.29837 0 3C0 2.70163 0.118526 2.41548 0.329505 2.2045C0.54048 1.99353 0.82663 1.875 1.125 1.875H2.32687C2.73407 1.87626 3.12988 2.00951 3.45493 2.25478C3.77998 2.50004 4.01674 2.84409 4.12969 3.23531L4.81312 5.625H21C21.1761 5.62499 21.3497 5.6663 21.5069 5.74561C21.664 5.82492 21.8004 5.94001 21.905 6.08164C22.0096 6.22326 22.0795 6.38746 22.1091 6.56102C22.1387 6.73458 22.6271 6.91266 22.5753 7.08094ZM19.4766 7.875H5.45531L7.41375 14.7281C7.43617 14.8065 7.48354 14.8755 7.54867 14.9245C7.6138 14.9736 7.69315 15.0001 7.77469 15H17.0072C17.0875 15.0002 17.1656 14.9746 17.2303 14.927C17.2949 14.8794 17.3426 14.8123 17.3662 14.7356L19.4766 7.875Z" fill="black"/>
                </svg>
            </a>
            <a href="#" class="icon-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 1.875C9.99746 1.875 8.0399 2.46882 6.37487 3.58137C4.70983 4.69392 3.41211 6.27523 2.64574 8.12533C1.87937 9.97544 1.67886 12.0112 2.06954 13.9753C2.46023 15.9393 3.42451 17.7435 4.84055 19.1595C6.25659 20.5755 8.06068 21.5398 10.0247 21.9305C11.9888 22.3211 14.0246 22.1206 15.8747 21.3543C17.7248 20.5879 19.3061 19.2902 20.4186 17.6251C21.5312 15.9601 22.125 14.0025 22.125 12C22.122 9.3156 21.0543 6.74199 19.1562 4.84383C17.258 2.94567 14.6844 1.87798 12 1.875ZM6.95969 18.4284C7.48188 17.7143 8.16532 17.1335 8.95421 16.7331C9.7431 16.3327 10.6153 16.124 11.5 16.124C12.3847 16.124 13.2569 16.3327 14.0458 16.7331C14.8347 17.1335 15.5181 17.7143 16.0403 18.4284C14.7134 19.3695 13.1268 19.875 11.5 19.875C9.87322 19.875 8.28665 19.3695 6.95969 18.4284ZM8.875 11.25C8.875 10.7308 9.02903 10.2233 9.31739 9.79163C9.60576 9.35995 10.0158 9.0235 10.4955 8.82482C10.9751 8.62614 11.5029 8.57415 12.0121 8.67544C12.5213 8.77672 12.989 9.02673 13.3562 9.39384C13.7233 9.76096 13.9733 10.2287 14.0746 10.7379C14.1759 11.2471 14.1239 11.7749 13.9252 12.2545C13.7265 12.7342 13.3901 13.1442 12.9584 13.4326C12.5267 13.721 12.0192 13.875 11.5 13.875C10.8038 13.875 10.1361 13.5984 9.64384 13.1062C9.15161 12.6139 8.875 11.9462 8.875 11.25ZM17.6875 16.8694C16.9583 15.9419 16.0289 15.1914 14.9688 14.6737C15.6444 13.9896 16.1026 13.1208 16.2858 12.1769C16.4689 11.2329 16.3688 10.2558 15.998 9.36861C15.6273 8.4814 15.0024 7.72364 14.202 7.19068C13.4017 6.65771 12.4616 6.37334 11.5 6.37334C10.5384 6.37334 9.59832 6.65771 8.79797 7.19068C7.99762 7.72364 7.37274 8.4814 7.00201 9.36861C6.63129 10.2558 6.53114 11.2329 6.71429 12.1769C6.89745 13.1208 7.35561 13.9896 8.03125 14.6737C6.97113 15.1914 6.04169 15.9419 5.3125 16.8694C4.39661 15.7083 3.82613 14.3129 3.66641 12.8427C3.5067 11.3725 3.76411 9.8871 4.40926 8.55644C5.05441 7.22578 6.06122 6.10366 7.31442 5.31855C8.56763 4.53343 10.0165 4.11703 11.4953 4.11703C12.9741 4.11703 14.4231 4.53343 15.6762 5.31855C16.9294 6.10366 17.9362 7.22578 18.5814 8.55644C19.2265 9.8871 19.484 11.3725 19.3242 12.8427C19.1645 14.3129 18.594 15.7083 17.6781 16.8694H17.6875Z" fill="black"/>
                </svg>
            </a>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="index.html">Home</a>
        <span>></span>
        <a href="shop.html">Shop</a>
        <span>></span>
        <a href="#">Color Page</a>
    </div>

    <!-- Shopping Cart Title -->
    <h1 class="cart-title">Shopping Cart</h1>

    <!-- Payment Content -->
    <div class="payment-container">
        <!-- Customer Information Side -->
        <div class="customer-info-container">
            <!-- Customer Info Section -->
            <div class="info-section">
                <h2>Customer Info</h2>
                <div class="form-group">
                    <label for="email">Email/No.Handphone</label>
                    <input type="text" id="email" placeholder="Enter your email or phone number">
                </div>
            </div>

            <!-- Shipping Address Section -->
            <div class="info-section">
                <h2>Shipping Address</h2>
                <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" placeholder="Enter your complete address"></textarea>
                </div>
                <div class="form-group">
                    <label for="notes">Order Notes</label>
                    <textarea id="notes" placeholder="Add any special instructions"></textarea>
                </div>
            </div>

            <!-- Payment Methods -->
            <div class="info-section">
                <h2>Metode Pembayaran</h2>
                <div class="payment-option">
                    <div class="payment-option-header">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;">
                            <path d="M2 8h20M6 16h2M4 12h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2z" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div>Transfer akun virtual</div>
                        <span style="margin-left: 10px;">></span>
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
                <h2>Your Payment Details</h2>
                <div class="cart-items">
                    <!-- Cart Item 1 -->
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="https://via.placeholder.com/70x70/e9e5d6/000000?text=K" alt="Kikopili Item">
                        </div>
                        <div class="item-details">
                            <h3>Kikopili (2)</h3>
                            <div class="color-option">
                                <div class="color-circle"></div>
                                <span>L</span>
                            </div>
                            <div class="quantity">
                                <button class="quantity-btn">-</button>
                                <span class="quantity-value">1</span>
                                <button class="quantity-btn">+</button>
                            </div>
                        </div>
                        <button class="remove-item">×</button>
                    </div>

                    <!-- Cart Item 2 -->
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="https://via.placeholder.com/70x70/e9e5d6/000000?text=K" alt="Kikopili Item">
                        </div>
                        <div class="item-details">
                            <h3>Kikopili (2)</h3>
                            <div class="color-option">
                                <div class="color-circle"></div>
                                <span>L</span>
                            </div>
                            <div class="quantity">
                                <button class="quantity-btn">-</button>
                                <span class="quantity-value">1</span>
                                <button class="quantity-btn">+</button>
                            </div>
                        </div>
                        <button class="remove-item">×</button>
                    </div>

                    <!-- Cart Item 3 -->
                    <div class="cart-item">
                        <div class="item-image">
                            <img src="https://via.placeholder.com/70x70/e9e5d6/000000?text=K" alt="Kikopili Item">
                        </div>
                        <div class="item-details">
                            <h3>Kikopili (2)</h3>
                            <div class="color-option">
                                <div class="color-circle"></div>
                                <span>L</span>
                            </div>
                            <div class="quantity">
                                <button class="quantity-btn">-</button>
                                <span class="quantity-value">1</span>
                                <button class="quantity-btn">+</button>
                            </div>
                        </div>
                        <button class="remove-item">×</button>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="payment-summary">
                    <div class="summary-row">
                        <div>Cart Subtotal:</div>
                        <div>Rp 450.000</div>
                    </div>
                    <div class="summary-row">
                        <div>Shipping:</div>
                        <div>Rp 15.000</div>
                    </div>
                    <div class="summary-row">
                        <div>Order Total:</div>
                        <div>Rp 465.000</div>
                    </div>
                </div>

                <!-- Checkout Button -->
                <button class="checkout-btn">Check Out</button>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="newsletter-section">
        <h2 class="newsletter-title">STAY UPTO DATE ABOUT OUR LATEST OFFERS</h2>
        <form class="newsletter-form">
            <input type="email" placeholder="Enter your email address" class="newsletter-input">
            <button type="submit" class="newsletter-btn">Subscribe</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <div class="footer-logo">KIKOPILI</div>
                <p class="footer-description">We have clothes that suits your style and which you're proud to wear. From women to men.</p>
                <div class="footer-social">
                    <a href="#" class="footer-social-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 3.5H14C12.7761 3.5 11.5 4.77325 11.5 6V8.5H9V11H11.5V17H14V11H16.5L17 8.5H14V6C14 5.72386 14.2298 5.5 14.5 5.5H16V3.5Z"/>
                        </svg>
                    </a>
                    <a href="#" class="footer-social-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7Z"/>
                            <path d="M14.75 2.5H9.25C5.52208 2.5 2.5 5.52208 2.5 9.25V14.75C2.5 18.4779 5.52208 21.5 9.25 21.5H14.75C18.4779 21.5 21.5 18.4779 21.5 14.75V9.25C21.5 5.52208 18.4779 2.5 14.75 2.5Z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="footer-section">
                <h3 class="footer-title">FOR MORE INFO</h3>
                <div class="footer-contact">
                    <span class="footer-contact-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4C3.20435 4 2.44129 4.31607 1.87868 4.87868C1.31607 5.44129 1 6.20435 1 7V17C1 17.7956 1.31607 18.5587 1.87868 19.1213C2.44129 19.6839 3.20435 20 4 20H20C20.7956 20 21.5587 19.6839 22.1213 19.1213C22.6839 18.5587 23 17.7956 23 17V7C23 6.20435 22.6839 5.44129 22.1213 4.87868C21.5587 4.31607 20.7956 4 20 4Z" stroke="black" stroke-width="2"/>
                            <path d="M1 8L12 14L23 8" stroke="black" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span>kikopili777@gmail.com</span>
                </div>
                <div class="footer-contact">
                    <span class="footer-contact-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.3834 16.5533C20.3834 16.5533 19.4059 16.3533 18.4834 16.0083C18.2996 15.9398 18.1022 15.9134 17.9053 15.9312C17.7084 15.949 17.5172 16.0106 17.3484 16.1108L15.1734 17.7358C12.4409 16.0708 9.92839 13.5708 8.26339 10.8308L9.88839 8.65081C9.98863 8.48205 10.0502 8.29084 10.068 8.09394C10.0858 7.89703 10.0595 7.69963 9.99089 7.51581C9.64589 6.59081 9.44589 5.60581 9.44589 4.61581C9.44589 4.17831 9.27161 3.75863 8.9609 3.44793C8.6502 3.13723 8.23052 2.96295 7.79302 2.96295H4.44589C4.00839 2.96295 3.58872 3.13723 3.27801 3.44793C2.96731 3.75863 2.79302 4.17831 2.79302 4.61581C2.79302 14.0383 10.4234 21.6683 19.8459 21.6683C20.2834 21.6683 20.703 21.494 21.0137 21.1833C21.3244 20.8726 21.4987 20.4529 21.4987 20.0154V16.6758C21.4987 16.2383 21.3244 15.8187 21.0137 15.5079C20.703 15.1972 20.2834 15.0229 19.8459 15.0229L21.3834 16.5533Z" stroke="black" stroke-width="2"/>
                        </svg>
                    </span>
                    <span>+62 896-9257-7256</span>
                </div>
                <div class="footer-contact">
                    <span class="footer-contact-icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z" stroke="black" stroke-width="2"/>
                            <path d="M19.5 10.5C19.5 17.6 12 21 12 21C12 21 4.5 17.6 4.5 10.5C4.5 8.31 5.36919 6.21 6.91421 4.66497C8.45923 3.11994 10.5592 2.25 12 2.25C13.4408 2.25 15.5408 3.11994 17.0858 4.66497C18.6308 6.21 19.5 8.31 19.5 10.5Z" stroke="black" stroke-width="2"/>
                        </svg>
                    </span>
                    <span>Jl. Cipto Mangunkusumo Gg. Min No.57, RT.001/RW.011, Puranglilana Utara, Kec. Ciledug, Kota Tangerang, Banten 15153.</span>
                </div>
            </div>
        </div>
    </footer>

    <script src="scroll-animations.js"></script>
</body>
</html> 