<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIKOPILI - Product Detail</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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

        .nav-dropdown {
            position: relative;
            display: inline-block;
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

        /* Product Detail Styles */
        .product-detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
        }

        .product-images {
            width: 50%;
            padding-right: 40px;
        }

        .product-main-image {
            width: 100%;
            height: auto;
            margin-bottom: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }

        .product-main-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .product-thumbnails {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .product-thumbnail {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
        }

        .product-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-info {
            width: 50%;
            padding-left: 20px;
        }

        .product-title {
            font-family: 'Abhaya Libre', serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .color-options {
            margin-bottom: 30px;
        }

        .option-label {
            font-family: 'Abhaya Libre', serif;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .color-list {
            display: flex;
            gap: 10px;
        }

        .color-option {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
        }

        .color-option.selected {
            box-shadow: 0 0 0 2px white, 0 0 0 4px #000;
        }

        .size-options {
            margin-bottom: 30px;
        }

        .size-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .size-option {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Abhaya Libre', serif;
            cursor: pointer;
        }

        .size-option.selected {
            background-color: #000;
            color: white;
            border-color: #000;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .quantity-btn {
            width: 40px;
            height: 40px;
            background-color: #f5f5f5;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
        }

        .quantity-input {
            width: 60px;
            height: 40px;
            text-align: center;
            border: 1px solid #ddd;
            margin: 0 10px;
            font-size: 18px;
        }

        .add-to-cart-btn {
            width: 100%;
            padding: 16px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-to-cart-btn:hover {
            background-color: #333;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Color swatch styles */
        .olive {
            background-color: #808000;
        }

        .dark-green {
            background-color: #1F6357;
        }

        .navy {
            background-color: #183B63;
        }

        /* Newsletter section */
        .newsletter-section {
            background-color: #000;
            color: white;
            padding: 40px;
            margin-top: 60px;
        }

        .newsletter-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .newsletter-title {
            font-family: 'Abhaya Libre', serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .newsletter-form {
            display: flex;
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 16px;
            border: none;
            font-size: 16px;
        }

        .newsletter-button {
            background-color: transparent;
            border: none;
            padding: 0 16px;
        }

        /* Footer styles */
        .footer {
            background-color: #f5f5f5;
            padding: 60px 40px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
        }

        .footer-logo {
            font-family: 'Abhaya Libre', serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-text {
            max-width: 300px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .footer-social {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-info {
            width: 50%;
        }

        .footer-contact {
            display: flex;
            flex-direction: column;
        }

        .footer-heading {
            font-family: 'Abhaya Libre', serif;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            margin-right: 10px;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .product-images, .product-info {
                width: 100%;
                padding: 0;
            }
            
            .product-images {
                margin-bottom: 40px;
            }
            
            .footer-container {
                flex-direction: column;
            }
            
            .footer-info, .footer-contact {
                width: 100%;
                margin-bottom: 40px;
            }
        }

        @media (max-width: 576px) {
            .newsletter-form {
                flex-direction: column;
            }
            
            .newsletter-button {
                margin-top: 10px;
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
                    <path d="M9.375 20.25C9.375 20.6208 9.26503 20.9834 9.059 21.2917C8.85298 21.6 8.56014 21.8404 8.21753 21.9823C7.87492 22.1242 7.49792 22.1613 7.1342 22.089C6.77049 22.0166 6.4364 21.838 6.17417 21.5758C5.91195 21.3136 5.73337 20.9795 5.66103 20.6158C5.58868 20.2521 5.62581 19.8751 5.76773 19.5325C5.90964 19.1899 6.14996 18.897 6.45831 18.691C6.76665 18.485 7.12916 18.375 7.5 18.375C7.99728 18.375 8.47419 18.5725 8.82582 18.9242C9.17745 19.2758 9.375 19.7527 9.375 20.25ZM17.25 18.375C16.8792 18.375 16.5166 18.485 16.2083 18.691C15.9 18.897 15.6596 19.1899 15.5177 19.5325C15.3758 19.8751 15.3387 20.2521 15.411 20.6158C15.4834 20.9795 15.662 21.3136 15.9242 21.5758C16.1864 21.838 16.5205 22.0166 16.8842 22.089C17.2479 22.1613 17.6249 22.1242 17.9675 21.9823C18.3101 21.8404 18.603 21.6 18.809 21.2917C19.015 20.9834 19.125 20.6208 19.125 20.25C19.125 19.7527 18.9275 19.2758 18.5758 18.9242C18.2242 18.5725 17.7473 18.375 17.25 18.375Z" fill="black"/>
                    <path d="M22.0753 7.08094L19.5169 15.3966C19.3535 15.9343 19.0211 16.4051 18.569 16.739C18.1169 17.0729 17.5692 17.2521 17.0072 17.25H7.77469C7.2046 17.2482 6.65046 17.0616 6.1953 16.7183C5.74015 16.3751 5.40848 15.8936 5.25 15.3459L2.04469 4.125H1.125C0.82663 4.125 0.54048 4.00647 0.329505 3.7955C0.118526 3.58452 0 3.29837 0 3C0 2.70163 0.118526 2.41548 0.329505 2.2045C0.54048 1.99353 0.82663 1.875 1.125 1.875H2.32687C2.73407 1.87626 3.12988 2.00951 3.45493 2.25478C3.77998 2.50004 4.01674 2.84409 4.12969 3.23531L4.81312 5.625H21C21.1761 5.62499 21.3497 5.6663 21.5069 5.74561C21.664 5.82492 21.8004 5.94001 21.905 6.08164C22.0096 6.22326 22.0795 6.38746 22.1091 6.56102C22.1387 6.73458 22.6271 6.91266 22.5753 7.08094ZM19.4766 7.875H5.45531L7.41375 14.7281C7.43617 14.8065 7.48354 14.8755 7.54867 14.9245C7.6138 14.9736 7.69315 15.0001 7.77469 15H17.0072C17.0875 15.0002 17.1656 14.9746 17.2303 14.927C17.2949 14.8794 17.3426 14.8123 17.3662 14.7356L19.4766 7.875Z" fill="black"/>
                </svg>
            </a>
            <a href="#" class="icon-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 1.875C9.99746 1.875 8.0399 2.46882 6.37487 3.58137C4.70983 4.69392 3.41211 6.27523 2.64574 8.12533C1.87937 9.97544 1.67886 12.0112 2.06954 13.9753C2.46023 15.9393 3.42451 17.7435 4.84055 19.1595C6.25659 20.5755 8.06068 21.5398 10.0247 21.9305C11.9888 22.3211 14.0246 22.1206 15.8747 21.3543C17.7248 20.5879 19.3061 19.2902 20.4186 17.6251C21.5312 15.9601 22.125 14.0025 22.125 12C22.122 9.3156 21.0543 6.74199 19.1562 4.84383C17.258 2.94567 14.6844 1.87798 12 1.875Z" fill="black"/>
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

    <!-- Newsletter Section -->
    <div class="newsletter-section">
        <div class="newsletter-container">
            <h3 class="newsletter-title">STAY UPTO DATE ABOUT OUR LATEST OFFERS</h3>
            <div class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Enter your email address">
                <button class="newsletter-button">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.75 12C21.75 12.1989 21.671 12.3897 21.5303 12.5303C21.3897 12.671 21.1989 12.75 21 12.75H3.75L9.53 18.53C9.6707 18.6707 9.74956 18.8615 9.74956 19.0605C9.74956 19.2595 9.6707 19.4503 9.53 19.591C9.3893 19.7317 9.19851 19.8106 8.99951 19.8106C8.80051 19.8106 8.60971 19.7317 8.47 19.591L1.47 12.591C1.39631 12.5175 1.33721 12.4292 1.29621 12.3311C1.25521 12.233 1.23316 12.1276 1.23141 12.0208C1.22966 11.9141 1.24824 11.8078 1.28599 11.7082C1.32374 11.6086 1.37995 11.5181 1.45125 11.4417C1.52255 11.3654 1.60842 11.3047 1.70358 11.2622C1.79875 11.2197 1.90177 11.1961 2.00847 11.1927C2.11517 11.1894 2.22017 11.2063 2.31899 11.2425C2.41781 11.2788 2.50862 11.3338 2.586 11.404L2.6 11.419L8.25 17.069V12.75H3C2.80109 12.75 2.61032 12.671 2.46967 12.5303C2.32902 12.3897 2.25 12.1989 2.25 12C2.25 11.8011 2.32902 11.6103 2.46967 11.4697C2.61032 11.329 2.80109 11.25 3 11.25H21C21.1989 11.25 21.3897 11.329 21.5303 11.4697C21.671 11.6103 21.75 11.8011 21.75 12Z" fill="white"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-container">
            <div class="footer-info">
                <div class="footer-logo">KIKOPILI</div>
                <p class="footer-text">We have clothes that suits your style and which you're proud to wear. From women to men.</p>
                <div class="footer-social">
                    <a href="#" class="social-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm3.066 7.787c-.1.043-.197.086-.298.132-1.92.86-3.838 1.725-5.555 2.83-.185.12-.37.24-.538.38-.226.188-.226.456.001.644.167.138.352.26.537.379 1.718 1.104 3.635 1.97 5.555 2.83.1.045.198.088.298.132.317.135.634-.068.634-.406V8.193c0-.338-.317-.541-.634-.406z" fill="black"/>
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm3.518 5.858c.294.006.597.01.89.01 1.014 0 2.008-.046 2.925-.134v2.398c-.898.084-1.871.13-2.863.134-.314.001-.629-.003-.953-.01v-.006h-.006c-1.562-.035-2.927-.335-3.635-1.656-.136-.254-.223-.526-.294-.8h2.915V5.78h-3.11v-.01c-.007-.537.01-1.068.043-1.598h2.242c-.01.562 0 1.125.032 1.686h2.358c.083-.704.057-1.404-.076-2.102-.35-1.85-2.118-3.106-4.358-3.106h-3.63v.01C4.87.787 3.683 2.681 3.683 4.817c0 2.136 1.187 4.03 2.916 5.136v-.01h3.63c.041 0 .082 0 .122-.003v.003h1.756v2.224h-1.756v.01c-3.635.069-6.54-2.94-6.54-6.546C3.81 1.99 7.51-1.027 12.001.16c3.063.81 5.186 3.55 5.186 6.752 0 .747-.132 1.463-.367 2.129-1.133 3.213-4.557 4.303-7.242 4.303h-1.766v2.35h1.766c.168 0 .335-.004.5-.01v.01h2.832V18h-2.832v-.01c-1.45-.036-2.823-.39-3.476-1.752-.06-.125-.114-.254-.164-.386h-2.727c.488 2.35 2.264 4.191 4.804 4.746 2.352.516 4.743.13 6.787-1.088 2.164-1.294 3.631-3.8 3.631-6.342 0-3.453-2.312-6.364-5.469-7.3.022-.01.042-.01.064-.01z" fill="black"/>
                        </svg>
                    </a>
                    <a href="#" class="social-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm6 9.344a4.87 4.87 0 01-1.4.384 2.43 2.43 0 001.07-1.346 4.88 4.88 0 01-1.55.593 2.43 2.43 0 00-4.134 2.215A6.9 6.9 0 015.6 8.4a2.43 2.43 0 00.752 3.244 2.43 2.43 0 01-1.1-.304v.03a2.43 2.43 0 001.95 2.38 2.43 2.43 0 01-1.1.042 2.43 2.43 0 002.27 1.685 4.88 4.88 0 01-3.6 1.008 6.9 6.9 0 003.74 1.094c4.486 0 6.937-3.718 6.937-6.937a7 7 0 00-.01-.315A4.96 4.96 0 0018 9.343z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-contact">
                <h3 class="footer-heading">FOR MORE INFO</h3>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 4H2v16h20V4zm-2 4l-8 5-8-5V6l8 5 8-5v2z" fill="black"/>
                        </svg>
                    </span>
                    <span>Kikopili777@gmail.com</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 10.999h2C22 5.869 18.127 2 12.99 2v2C17.052 4 20 6.943 20 10.999z" fill="black"/>
                            <path d="M13 8c2.103 0 3 .897 3 3h2c0-3.225-1.775-5-5-5v2zm3.422 5.443a1.001 1.001 0 00-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 00.043-1.391L6.859 3.513a1 1 0 00-1.391-.087l-2.17 1.861a1 1 0 00-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 00.648-.291l1.86-2.171a1 1 0 00-.086-1.391l-4.064-3.696z" fill="black"/>
                        </svg>
                    </span>
                    <span>+62 896-9557-7736</span>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z" fill="black"/>
                        </svg>
                    </span>
                    <span>Jl Cipete Muara/Kuningan Gg. Mlin No.57, RT.001/RW.013, Paninggilan Utara, Kec. Ciledug, Kota Tangerang, Banten 15153</span>
                </div>
            </div>
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
</body>
</html> 
