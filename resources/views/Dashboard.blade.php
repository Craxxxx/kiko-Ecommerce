<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIKOPILI - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abhaya+Libre:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
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
            z-index: 1000; /* Highest z-index value */
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

        /* Hero Section Styles */
        .hero-section {
            display: flex;
            padding: 60px 5%;
            background-color: #ffffff;
            min-height: 90vh;
            align-items: center;
        }

        .hero-content {
            width: 45%;
            padding-right: 40px;
        }

        .hero-title {
            font-size: 60px;
            font-weight: 700;
            margin-bottom: 40px;
            line-height: 1.2;
            font-family: 'Abhaya Libre', serif;
        }

        .hero-images {
            width: 55%;
            height: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .logo-variant {
            width: 100%;
            height: auto;
            max-height: 600px;
            object-fit: contain;
        }

        .shop-now-btn {
            display: inline-block;
            background-color: #000;
            color: white;
            padding: 16px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 40px;
            transition: background-color 0.3s;
        }

        .shop-now-btn:hover {
            background-color: #333;
        }

        .category-tabs {
            display: flex;
            gap: 0;
            margin-top: 60px;
            border-bottom: 1px solid #e0e0e0;
        }

        .category-tab {
            padding: 15px 40px;
            text-decoration: none;
            color: #000;
            font-family: 'Abhaya Libre', serif;
            font-weight: 800;
            font-size: 36px;
            position: relative;
            border: none;
            background: transparent;
        }

        .category-tab:not(:last-child)::after {
            content: "";
            position: absolute;
            right: 0;
            top: 20%;
            height: 60%;
            width: 1px;
            background-color: #e0e0e0;
        }

        .category-tab:hover {
            color: #555;
        }

        .scroll-indicator {
            text-align: center;
            margin-top: 80px;
            font-weight: 500;
        }

        /* Our Brand Section Styles */
        .brand-section {
            padding: 80px 5%;
            background-color: #ffffff;
            max-width: 1600px;
            margin: 0 auto;
        }

        .brand-title {
            font-family: 'Abhaya Libre', serif;
            font-weight: 800;
            font-size: 48px;
            text-align: center;
            margin-bottom: 60px;
        }

        .products-grid {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
        }

        .product-card {
            flex: 1;
            min-width: 280px;
            max-width: 380px;
            margin-bottom: 30px;
            display: flex;
            flex-direction: column;
        }

        .product-image {
            width: 100%;
            height: auto;
            max-height: 500px;
            object-fit: contain;
        }

        .product-name {
            font-family: 'Abhaya Libre', serif;
            font-weight: 800;
            font-size: 28px;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .star {
            color: #FFD700;
            font-size: 20px;
        }

        .half-star {
            color: #FFD700;
            font-size: 18px;
            position: relative;
            display: inline-block;
        }

        .half-star:after {
            content: "★";
            color: #FFD700;
            position: absolute;
            left: 0;
            top: 0;
            width: 50%;
            overflow: hidden;
        }

        .rating-value {
            color: #666;
            font-size: 18px;
            margin-left: 5px;
        }

        @media (max-width: 1200px) {
            .products-grid {
                justify-content: center;
            }
            
            .product-card {
                min-width: 300px;
                max-width: 400px;
            }
        }

        @media (max-width: 768px) {
            .product-card {
                min-width: 250px;
                max-width: 100%;
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
                    <path d="M9.375 20.25C9.375 20.6208 9.26503 20.9834 9.059 21.2917C8.85298 21.6 8.56014 21.8404 8.21753 21.9823C7.87492 22.1242 7.49792 22.1613 7.1342 22.089C6.77049 22.0166 6.4364 21.838 6.17417 21.5758C5.91195 21.3136 5.73337 20.9795 5.66103 20.6158C5.58868 20.2521 5.62581 19.8751 5.76773 19.5325C5.90964 19.1899 6.14996 18.897 6.45831 18.691C6.76665 18.485 7.12916 18.375 7.5 18.375C7.99728 18.375 8.47419 18.5725 8.82582 18.9242C9.17745 19.2758 9.375 19.7527 9.375 20.25ZM17.25 18.375C16.8792 18.375 16.5166 18.485 16.2083 18.691C15.9 18.897 15.6596 19.1899 15.5177 19.5325C15.3758 19.8751 15.3387 20.2521 15.411 20.6158C15.4834 20.9795 15.662 21.3136 15.9242 21.5758C16.1864 21.838 16.5205 22.0166 16.8842 22.089C17.2479 22.1613 17.6249 22.1242 17.9675 21.9823C18.3101 21.8404 18.603 21.6 18.809 21.2917C19.015 20.9834 19.125 20.6208 19.125 20.25C19.125 19.7527 18.9275 19.2758 18.5758 18.9242C18.2242 18.5725 17.7473 18.375 17.25 18.375ZM22.0753 7.08094L19.5169 15.3966C19.3535 15.9343 19.0211 16.4051 18.569 16.739C18.1169 17.0729 17.5692 17.2521 17.0072 17.25H7.77469C7.2046 17.2482 6.65046 17.0616 6.1953 16.7183C5.74015 16.3751 5.40848 15.8936 5.25 15.3459L2.04469 4.125H1.125C0.82663 4.125 0.54048 4.00647 0.329505 3.7955C0.118526 3.58452 0 3.29837 0 3C0 2.70163 0.118526 2.41548 0.329505 2.2045C0.54048 1.99353 0.82663 1.875 1.125 1.875H2.32687C2.73407 1.87626 3.12988 2.00951 3.45493 2.25478C3.77998 2.50004 4.01674 2.84409 4.12969 3.23531L4.81312 5.625H21C21.1761 5.62499 21.3497 5.6663 21.5069 5.74561C21.664 5.82492 21.8004 5.94001 21.905 6.08164C22.0096 6.22326 22.0795 6.38746 22.1091 6.56102C22.1387 6.73458 22.1271 6.91266 22.0753 7.08094ZM19.4766 7.875H5.45531L7.41375 14.7281C7.43617 14.8065 7.48354 14.8755 7.54867 14.9245C7.6138 14.9736 7.69315 15.0001 7.77469 15H17.0072C17.0875 15.0002 17.1656 14.9746 17.2303 14.927C17.2949 14.8794 17.3426 14.8123 17.3662 14.7356L19.4766 7.875Z" fill="black"/>
                </svg>
            </a>
            <a href="#" class="icon-link">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 1.875C9.99746 1.875 8.0399 2.46882 6.37487 3.58137C4.70983 4.69392 3.41211 6.27523 2.64574 8.12533C1.87937 9.97544 1.67886 12.0112 2.06954 13.9753C2.46023 15.9393 3.42451 17.7435 4.84055 19.1595C6.25659 20.5755 8.06068 21.5398 10.0247 21.9305C11.9888 22.3211 14.0246 22.1206 15.8747 21.3543C17.7248 20.5879 19.3061 19.2902 20.4186 17.6251C21.5312 15.9601 22.125 14.0025 22.125 12C22.122 9.3156 21.0543 6.74199 19.1562 4.84383C17.258 2.94567 14.6844 1.87798 12 1.875ZM6.95969 18.4284C7.48188 17.7143 8.16532 17.1335 8.95421 16.7331C9.7431 16.3327 10.6153 16.124 11.5 16.124C12.3847 16.124 13.2569 16.3327 14.0458 16.7331C14.8347 17.1335 15.5181 17.7143 16.0403 18.4284C14.7134 19.3695 13.1268 19.875 11.5 19.875C9.87322 19.875 8.28665 19.3695 6.95969 18.4284ZM8.875 11.25C8.875 10.7308 9.02903 10.2233 9.31739 9.79163C9.60576 9.35995 10.0158 9.0235 10.4955 8.82482C10.9751 8.62614 11.5029 8.57415 12.0121 8.67544C12.5213 8.77672 12.989 9.02673 13.3562 9.39384C13.7233 9.76096 13.9733 10.2287 14.0746 10.7379C14.1759 11.2471 14.1239 11.7749 13.9252 12.2545C13.7265 12.7342 13.3901 13.1442 12.9584 13.4326C12.5267 13.721 12.0192 13.875 11.5 13.875C10.8038 13.875 10.1361 13.5984 9.64384 13.1062C9.15161 12.6139 8.875 11.9462 8.875 11.25ZM17.6875 16.8694C16.9583 15.9419 16.0289 15.1914 14.9688 14.6737C15.6444 13.9896 16.1026 13.1208 16.2858 12.1769C16.4689 11.2329 16.3688 10.2558 15.998 9.36861C15.6273 8.4814 15.0024 7.72364 14.202 7.19068C13.4017 6.65771 12.4616 6.37334 11.5 6.37334C10.5384 6.37334 9.59832 6.65771 8.79797 7.19068C7.99762 7.72364 7.37274 8.4814 7.00201 9.36861C6.63129 10.2558 6.53114 11.2329 6.71429 12.1769C6.89745 13.1208 7.35561 13.9896 8.03125 14.6737C6.97113 15.1914 6.04169 15.9419 5.3125 16.8694C4.39661 15.7083 3.82613 14.3129 3.66641 12.8427C3.5067 11.3725 3.76411 9.8871 4.40926 8.55644C5.05441 7.22578 6.06122 6.10366 7.31442 5.31855C8.56763 4.53343 10.0165 4.11703 11.4953 4.11703C12.9741 4.11703 14.4231 4.53343 15.6762 5.31855C16.9294 6.10366 17.9362 7.22578 18.5814 8.55644C19.2265 9.8871 19.484 11.3725 19.3242 12.8427C19.1645 14.3129 18.594 15.7083 17.6781 16.8694H17.6875Z" fill="black"/>
                </svg>
            </a>
        </div>
    </nav>

    <!-- Hero Section (First section of landing page) -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title scroll-animate-left">FIND CLOTHES<br>THAT MATCHES<br>YOUR STYLE</h1>
            <a href="#" class="shop-now-btn scroll-animate-left delay-200">Shop Now</a>
            
            <div class="category-tabs">
                <a href="#" class="category-tab">CUSTOM</a>
                <a href="#" class="category-tab">SHIRT</a>
                <a href="#" class="category-tab">OTHER</a>
            </div>
        </div>
        <div class="hero-images">
            <img src="{{ asset('images/Rectangle 9.svg') }}" alt="KIKO Logo Blue" class="logo-variant scroll-animate-right">
        </div>
    </section>

    <div class="scroll-indicator">
        Scroll down
    </div>

    <!-- Our Brand Section -->
    <section class="brand-section">
        <h2 class="brand-title scroll-animate">Our Brand</h2>
        
        <div class="products-grid">
            <!-- Virgo Product -->
            <div class="product-card">
                <img src="{{ asset('images/Frame 32.svg') }}" alt="Virgo T-Shirt" class="product-image">
                <h3 class="product-name">Virgo</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0.5;">★</span>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>
            
            <!-- Gemini Product -->
            <div class="product-card">
                <img src="{{ asset('images/Frame 32.svg') }}" alt="Gemini T-Shirt" class="product-image">
                <h3 class="product-name">Gemini</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0.5;">★</span>
                    <span class="star" style="opacity: 0;">★</span>
                    <span class="rating-value">3.5/5</span>
                </div>
            </div>
            
            <!-- Sagitarius Product -->
            <div class="product-card">
                <img src="{{ asset('images/Frame 32.svg') }}" alt="Sagitarius T-Shirt" class="product-image">
                <h3 class="product-name">Sagitarius</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0.5;">★</span>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>
            
            <!-- Back Zodiac Product -->
            <div class="product-card">
                <img src="{{ asset('images/Frame 32.svg') }}" alt="Back Zodiac T-Shirt" class="product-image">
                <h3 class="product-name">Back Zodiac</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0.5;">★</span>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Selling Section -->
    <section class="brand-section">
        <h2 class="brand-title scroll-animate">top selling</h2>
        
        <div class="products-grid">
            <!-- Kate-Kate Product -->
            <div class="product-card">
                <img src="{{ asset('images/shirt.svg') }}" alt="Kate-Kate T-Shirt" class="product-image">
                <h3 class="product-name">Kate-Kate (1)</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="rating-value">5.0/5</span>
                </div>
            </div>
            
            <!-- Kikopili Product -->
            <div class="product-card">
                <img src="{{ asset('images/shirt.svg') }}" alt="Kikopili T-Shirt" class="product-image">
                <h3 class="product-name">Kikopili (1)</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0;">★</span>
                    <span class="rating-value">4.0/5</span>
                </div>
            </div>
            
            <!-- Quote Product -->
            <div class="product-card">
                <img src="{{ asset('images/shirt.svg') }}" alt="Quote T-Shirt" class="product-image">
                <h3 class="product-name">Quote (2)</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0;">★</span>
                    <span class="star" style="opacity: 0;">★</span>
                    <span class="rating-value">3.0/5</span>
                </div>
            </div>
            
            <!-- Love Shoot Product -->
            <div class="product-card">
                <img src="{{ asset('images/shirt.svg') }}" alt="Love Shoot T-Shirt" class="product-image">
                <h3 class="product-name">Love Shoot (1)</h3>
                <div class="product-rating">
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star">★</span>
                    <span class="star" style="opacity: 0.5;">★</span>
                    <span class="rating-value">4.5/5</span>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin: 40px 0;">
            <a href="#" class="scroll-animate" style="display: inline-block; padding: 15px 40px; border: 1px solid #e0e0e0; border-radius: 30px; text-decoration: none; color: #000; font-weight: 500;">View All</a>
        </div>

        <!-- Testimonials Section -->
        <div style="position: relative; margin-top: 60px;">
            <div style="position: absolute; top: 0; right: 0; display: flex; gap: 10px; z-index: 5;">
                <button id="prev-testimonial" style="background: none; border: none; cursor: pointer;">
                    <img src="{{ asset('images/arrow-down-bold 2.svg') }}" alt="Previous" width="24" height="24">
                </button>
                <button id="next-testimonial" style="background: none; border: none; cursor: pointer;">
                    <img src="{{ asset('images/arrow-down-bold 1.svg') }}" alt="Next" width="24" height="24">
                </button>
            </div>
            
            <div id="testimonials-container" style="overflow: hidden; width: 100%;">
                <div id="testimonials-slider" class="scroll-animate" style="display: flex; transition: transform 0.5s ease; width: 100%;">
                    <!-- Testimonial 1 -->
                    <div class="testimonial-slide" style="flex: 0 0 calc(33.333% - 20px); min-width: calc(33.333% - 20px); margin-right: 30px; padding: 30px; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">
                        <div style="display: flex; margin-bottom: 15px;">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <h3 style="font-family: 'Abhaya Libre', serif; font-size: 24px; margin-bottom: 15px;">Ilham Kurniawan <span style="color: green;">✓</span></h3>
                        <p style="color: #666;">Bagus banget pokoknya gaada yang cacat hasil sablonnya</p>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="testimonial-slide" style="flex: 0 0 calc(33.333% - 20px); min-width: calc(33.333% - 20px); margin-right: 30px; padding: 30px; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">
                        <div style="display: flex; margin-bottom: 15px;">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <h3 style="font-family: 'Abhaya Libre', serif; font-size: 24px; margin-bottom: 15px;">Windah Basudara <span style="color: green;">✓</span></h3>
                        <p style="color: #666;">Kereen ga gampang luntur sablonan nya</p>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="testimonial-slide" style="flex: 0 0 calc(33.333% - 20px); min-width: calc(33.333% - 20px); margin-right: 30px; padding: 30px; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">
                        <div style="display: flex; margin-bottom: 15px;">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <h3 style="font-family: 'Abhaya Libre', serif; font-size: 24px; margin-bottom: 15px;">Yose Kurniawan <span style="color: green;">✓</span></h3>
                        <p style="color: #666;">Pengirimannya cepat, harganya juga pas, kualitasnya oke bgt</p>
                    </div>
                    
                    <!-- Testimonial 4 (Mooen) -->
                    <div class="testimonial-slide" style="flex: 0 0 calc(33.333% - 20px); min-width: calc(33.333% - 20px); margin-right: 30px; padding: 30px; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">
                        <div style="display: flex; margin-bottom: 15px;">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <h3 style="font-family: 'Abhaya Libre', serif; font-size: 24px; margin-bottom: 15px;">Mooen <span style="color: green;">✓</span></h3>
                        <p style="color: #666;">The best pokoknya ma</p>
                    </div>
                    
                    <!-- Testimonial 5 (Sarah M.) -->
                    <div class="testimonial-slide" style="flex: 0 0 calc(33.333% - 20px); min-width: calc(33.333% - 20px); margin-right: 30px; padding: 30px; border: 1px solid #e0e0e0; border-radius: 10px; box-sizing: border-box;">
                        <div style="display: flex; margin-bottom: 15px;">
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                            <span class="star">★</span>
                        </div>
                        <h3 style="font-family: 'Abhaya Libre', serif; font-size: 24px; margin-bottom: 15px;">Sarah M. <span style="color: green;">✓</span></h3>
                        <p style="color: #666;">AJSUYGIDLVHIAS ouisbadhy S 'isavg dasp hdusabh dkasjnldsajubhsav</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter and Contact Section -->
    <div style="display: flex; flex-direction: column; width: 100%; margin-top: 80px;">
        <!-- Newsletter Section -->
        <div style="background-color: black; color: white; padding: 40px 60px; display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-family: 'Abhaya Libre', serif; font-size: 42px; font-weight: 500;">STAY UPTO DATE ABOUT OUR<br>LATEST OFFERS</h2>
            <div style="position: relative;">
                <input type="email" placeholder="Enter your email address" style="padding: 15px 30px 15px 60px; border-radius: 50px; border: none; width: 300px; font-family: 'Abhaya Libre', serif; font-weight: 500;">
                <div style="position: absolute; left: 25px; top: 50%; transform: translateY(-50%);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="#666666"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Contact Info Section -->
        <div style="padding: 40px 60px; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <h2 style="font-family: 'Abhaya Libre', serif; font-size: 36px; font-weight: 700; margin-bottom: 30px;">KIKOPILI</h2>
                <p style="font-family: 'Abhaya Libre', serif; font-weight: 500; max-width: 400px; line-height: 1.5;">We have clothes that suits your style and which you're proud to wear. From women to men.</p>
                
                <div style="display: flex; gap: 20px; margin-top: 30px;">
                    <a href="#" style="display: inline-block; width: 40px; height: 40px; border-radius: 50%; border: 1px solid #000; display: flex; justify-content: center; align-items: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" fill="black"/>
                        </svg>
                    </a>
                    <a href="#" style="display: inline-block; width: 40px; height: 40px; border-radius: 50%; border: 1px solid #000; display: flex; justify-content: center; align-items: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <div>
                <h3 style="font-family: 'Abhaya Libre', serif; font-size: 24px; font-weight: 500; margin-bottom: 30px;">FOR MORE INFO</h3>
                
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="black"/>
                        </svg>
                        <span style="font-family: 'Abhaya Libre', serif; font-weight: 500;">Kikopili777@gmail.com</span>
                    </div>
                    
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 15.5c-1.25 0-2.45-.2-3.57-.57a1.02 1.02 0 0 0-1.02.24l-2.2 2.2a15.045 15.045 0 0 1-6.59-6.59l2.2-2.21a.96.96 0 0 0 .25-1A11.36 11.36 0 0 1 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM19 12h2a9 9 0 0 0-9-9v2c3.87 0 7 3.13 7 7zm-4 0h2c0-2.76-2.24-5-5-5v2c1.66 0 3 1.34 3 3z" fill="black"/>
                        </svg>
                        <span style="font-family: 'Abhaya Libre', serif; font-weight: 500;">+62 896-9537-7756</span>
                    </div>
                    
                    <div style="display: flex; align-items: flex-start; gap: 15px;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z" fill="black"/>
                        </svg>
                        <span style="font-family: 'Abhaya Libre', serif; font-weight: 500; max-width: 300px;">Jl. Cipto Mangunkusumo Gg. Miin No.37, RT.001/RW.011, Paninggilan Utara, Kec. Ciledug, Kota Tangerang, Banten 15153</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for testimonial slider
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('testimonials-slider');
            const prevBtn = document.getElementById('prev-testimonial');
            const nextBtn = document.getElementById('next-testimonial');
            const slides = document.querySelectorAll('.testimonial-slide');
            const container = document.getElementById('testimonials-container');
            
            let currentIndex = 0;
            const slidesToShow = 3;
            const totalSlides = slides.length;
            
            // Calculate slide width properly
            function getSlideWidth() {
                // Get container width and divide by 3 for 3 slides
                const containerWidth = container.offsetWidth;
                const slideWidth = (containerWidth / slidesToShow);
                return slideWidth;
            }
            
            function updateSlider() {
                const slideWidth = getSlideWidth();
                slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            }
            
            prevBtn.addEventListener('click', function() {
                console.log('Previous button clicked');
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            });
            
            nextBtn.addEventListener('click', function() {
                console.log('Next button clicked');
                if (currentIndex < totalSlides - slidesToShow) {
                    currentIndex++;
                    updateSlider();
                }
            });
            
            // Initial setup
            window.setTimeout(updateSlider, 100); // Small delay to ensure all elements are rendered
            
            // Update on window resize
            window.addEventListener('resize', updateSlider);
        });
    </script>
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
</body>
</html> 
