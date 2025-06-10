<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIKOPILI - Shop</title>
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            margin: 5% auto;
            padding: 0;
            width: 80%;
            max-width: 700px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            animation: modalopen 0.4s;
        }

        @keyframes modalopen {
            from {opacity: 0; transform: scale(0.8);}
            to {opacity: 1; transform: scale(1);}
        }

        .close-modal {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #000;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
            z-index: 1002;
        }

        .modal-content img {
            width: 100%;
            height: auto;
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

        /* Shop Page Styles */
        .shop-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .shop-title {
            font-family: 'Abhaya Libre', serif;
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 40px;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .product-card {
            margin-bottom: 60px;
        }

        .product-image {
            width: 100%;
            height: auto;
            background-color: #f5f5f5;
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .product-name {
            font-family: 'Abhaya Libre', serif;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .product-name a{
            font-family: 'Abhaya Libre', serif;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 8px;
            color: inherit; /* Inherits color from parent, optional */
            text-decoration: none; /* Removes underline */
        }

        .product-rating {
            display: flex;
            align-items: center;
        }

        .stars {
            display: flex;
            margin-right: 8px;
        }

        .star {
            color: #FFD700;
            font-size: 20px;
        }

        .rating-value {
            color: #666;
            font-size: 16px;
        }

        @media (max-width: 992px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .product-grid {
                grid-template-columns: 1fr;
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
            <a href="{{ route('payment') }}" class="icon-link">
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
        <a href="#">Home</a>
        <span>></span>
        <a href="#">Shop</a>
    </div>

    <!-- Shop Content -->
    <div class="shop-container">
        <h1 class="shop-title">SHIRT</h1>

        <div class="product-grid">
            <!-- Row 1 -->
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/Frame 33.png') }}" alt="Kate-Kate T-Shirt">
                </div>
                <h3 class="product-name"><a href="{{ route('product.detail') }}">Kate-Kate (2)</a></h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0.5;">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">3.5/5</span>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/Frame 34.png') }}" alt="Quote T-Shirt">
                </div>
                <h3 class="product-name">Quote (2)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0.5;">★</span>
                    </div>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/Frame 38.png') }}" alt="Love shoot T-Shirt">
                </div>
                <h3 class="product-name">Love shoot (2)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <span class="rating-value">5.0/5</span>
                </div>
            </div>

            <!-- Row 2 -->
            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/Frame 71.png') }}" alt="Kikopili">
                </div>
                <h3 class="product-name">Kikopili (2)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0.5;">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">3.5/5</span>
                </div>
            </div>

            <!-- Product 5 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/Frame 72.png') }}" alt="Kikopili">
                </div>
                <h3 class="product-name">Kikopili (5)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0.5;">★</span>
                    </div>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>

            <!-- Product 6 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/Frame 73.png') }}" alt="Kate-Kate T-Shirt">
                </div>
                <h3 class="product-name">Kate-Kate (3)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0.5;">★</span>
                    </div>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>

            <!-- Row 3 -->
            <!-- Product 7 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Sagitarius T-Shirt">
                </div>
                <h3 class="product-name">Sagitarius</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <span class="rating-value">5.0/5</span>
                </div>
            </div>

            <!-- Product 8 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kate-Kate T-Shirt">
                </div>
                <h3 class="product-name">Kate-Kate (4)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">4.0/5</span>
                </div>
            </div>

            <!-- Product 9 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Sheep T-Shirt">
                </div>
                <h3 class="product-name">Sheep</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">3.0/5</span>
                </div>
            </div>

            <!-- Row 4 -->
            <!-- Product 10 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kate-Kate T-Shirt">
                </div>
                <h3 class="product-name">Kate-Kate (1)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <span class="rating-value">5.0/5</span>
                </div>
            </div>

            <!-- Product 11 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kate-Kate T-Shirt">
                </div>
                <h3 class="product-name">Kate-Kate (1.2)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">4.0/5</span>
                </div>
            </div>

            <!-- Product 12 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kate-Kate T-Shirt">
                </div>
                <h3 class="product-name">Kate-Kate (4.2)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">3.0/5</span>
                </div>
            </div>

            <!-- Row 5 -->
            <!-- Product 13 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kikopili">
                </div>
                <h3 class="product-name">Kikopili (3)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0.5;">★</span>
                    </div>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>

            <!-- Product 14 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kikopili">
                </div>
                <h3 class="product-name">Kikopili (4)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                    </div>
                    <span class="rating-value">5.0/5</span>
                </div>
            </div>

            <!-- Product 15 -->
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/shirt.svg') }}" alt="Kikopili">
                </div>
                <h3 class="product-name">Kikopili (6)</h3>
                <div class="product-rating">
                    <div class="stars">
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star">★</span>
                        <span class="star" style="opacity: 0;">★</span>
                    </div>
                    <span class="rating-value">4.0/5</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Button Section -->
    <div style="text-align: center; margin: 40px 0; border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 20px 0;">
        <a href="#" id="pricelistBtn" style="display: inline-block; background-color: #000; color: white; font-family: 'Abhaya Libre', serif; font-weight: 500; padding: 15px 50px; text-decoration: none; border-radius: 50px; margin-bottom: 20px;">Pricelist</a>
        
        <div style="display: flex; justify-content: center; align-items: center; margin-top: 30px;">
            <a href="color.html" style="display: inline-block; color: #000; font-family: 'Abhaya Libre', serif; font-weight: 500; border: 1px solid #ddd; padding: 15px 50px; text-decoration: none; border-radius: 50px;">Color Page</a>
            <div style="margin-left: 20px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.172 12L8.222 7.05L9.636 5.636L16 12L9.636 18.364L8.222 16.95L13.172 12Z" fill="black"/>
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Newsletter Section -->
    <div style="background-color: #000; color: white; padding: 50px 20px; margin: 40px 0; text-align: center;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;">
            <div style="text-align: left;">
                <h2 style="font-family: 'Abhaya Libre', serif; font-size: 32px; font-weight: 500; margin-bottom: 10px;">STAY UPTO DATE ABOUT OUR<br>LATEST OFFERS</h2>
            </div>
            <div style="position: relative; width: 40%;">
                <input type="email" placeholder="Enter your email address" style="width: 100%; padding: 15px 50px 15px 15px; border-radius: 50px; border: none; font-family: 'Abhaya Libre', serif; font-weight: 500;">
                <div style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 6.00016L12 16.0002L22 6.00016M2 6.00016V18.0002H22V6.00016M2 6.00016H22" stroke="black" stroke-width="2"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Section -->
    <footer style="background-color: #f7f7f7; padding: 50px 0;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; padding: 0 20px;">
            <div style="max-width: 300px;">
                <h2 style="font-family: 'Abhaya Libre', serif; font-size: 32px; font-weight: 500; margin-bottom: 20px;">KIKOPILI</h2>
                <p style="font-family: 'Abhaya Libre', serif; font-weight: 500; margin-bottom: 30px; line-height: 1.6;">We have clothes that suits your style and which you're proud to wear. From women to men.</p>
                <div style="display: flex; gap: 15px;">
                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; border: 1px solid #000;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 5.80a8.49 8.49 0 0 1-2.36.64 4.13 4.13 0 0 0 1.81-2.27 8.21 8.21 0 0 1-2.61 1 4.1 4.1 0 0 0-7 3.74 11.64 11.64 0 0 1-8.45-4.29 4.16 4.16 0 0 0-.55 2.07 4.09 4.09 0 0 0 1.82 3.41 4.05 4.05 0 0 1-1.86-.51v.05a4.1 4.1 0 0 0 3.3 4 3.93 3.93 0 0 1-1.1.17 4.1 4.1 0 0 1-.77-.07 4.11 4.11 0 0 0 3.83 2.84A8.22 8.22 0 0 1 3 18.34a7.93 7.93 0 0 1-1-.06 11.57 11.57 0 0 0 6.29 1.85A11.59 11.59 0 0 0 20 8.45v-.53a8.43 8.43 0 0 0 2-2.12z" fill="black"/>
                        </svg>
                    </a>
                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; border: 1px solid #000; background-color: #000;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" fill="white"/>
                        </svg>
                    </a>
                    <a href="#" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 50%; border: 1px solid #000;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 8a4 4 0 0 1 4 4 4 4 0 0 1-4 4 4 4 0 0 1-4-4 4 4 0 0 1 4-4m0-2a6 6 0 0 0-6 6 6 6 0 0 0 6 6 6 6 0 0 0 6-6 6 6 0 0 0-6-6z" fill="black"/>
                            <path d="M12 2h8a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h8z" stroke="black" stroke-width="2"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 style="font-family: 'Abhaya Libre', serif; font-size: 18px; font-weight: 500; margin-bottom: 20px;">FOR MORE INFO</h3>
                <div style="margin-bottom: 15px; display: flex; align-items: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;">
                        <path d="M3 8L10.7528 13.1056C11.5343 13.6187 12.4657 13.6187 13.2472 13.1056L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="black" stroke-width="2"/>
                    </svg>
                    <a href="mailto:Kikopili777@gmail.com" style="color: #000; text-decoration: none; font-family: 'Abhaya Libre', serif; font-weight: 500;">Kikopili777@gmail.com</a>
                </div>
                <div style="margin-bottom: 15px; display: flex; align-items: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px;">
                        <path d="M3 5C3 3.89543 3.89543 3 5 3H8.27924C8.70967 3 9.09086 3.27543 9.22051 3.68377L10.7585 8.41884C10.8956 8.85852 10.7078 9.33397 10.3067 9.57279L8.21252 10.8231C9.32088 13.2068 11.2145 15.1187 13.5868 16.2359L14.8385 14.1337C15.0769 13.7315 15.5519 13.5435 15.9911 13.6809L20.722 15.2202C21.13 15.3499 21.4051 15.7311 21.4051 16.1615V19.4385C21.4051 20.5431 20.5097 21.4385 19.4051 21.4385H18.4051C9.93358 21.4385 3 14.5049 3 6.03343V5Z" stroke="black" stroke-width="2"/>
                    </svg>
                    <a href="tel:+6289657537736" style="color: #000; text-decoration: none; font-family: 'Abhaya Libre', serif; font-weight: 500;">+62 896-5753-7736</a>
                </div>
                <div style="display: flex; align-items: flex-start;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right: 10px; margin-top: 3px;">
                        <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="black" stroke-width="2"/>
                        <path d="M19.5 10C19.5 16.5 12 21 12 21C12 21 4.5 16.5 4.5 10C4.5 6.13401 7.86401 3 12 3C16.136 3 19.5 6.13401 19.5 10Z" stroke="black" stroke-width="2"/>
                    </svg>
                    <p style="margin: 0; font-family: 'Abhaya Libre', serif; font-weight: 500; max-width: 250px;">Jl. Cipto Mangunkusumo Gg. Miin No.57, RT.001/RW.011, Paninggilan Utara, Kec. Ciledug, Kota Tangerang, Banten 15153</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Pricelist Modal -->
    <div id="pricelistModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <img src="{{ asset('images/Booklet-04 1.svg') }}" alt="Pricelist">
        </div>
    </div>

    <script>
        // Get the modal
        const modal = document.getElementById("pricelistModal");
        
        // Get the button that opens the modal
        const btn = document.getElementById("pricelistBtn");
        
        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close-modal")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function(e) {
            e.preventDefault();
            modal.style.display = "block";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
</body>
</html> 
