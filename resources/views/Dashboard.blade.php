@extends('layouts.app')
@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
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
@endsection