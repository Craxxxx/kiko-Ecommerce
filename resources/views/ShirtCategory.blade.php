@extends('layouts.app')
@section('title', 'ShirtCategory')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/Category.css') }}">
@endpush
    
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="#">Home</a>
        <span>></span>
        <a href="#">Shop</a>
    </div>

    <!-- Shop Content -->
    <div class="shop-container">
    <h1 class="shop-title">SHIRT</h1>

    @foreach($products->chunk(3) as $row)
    <div class="product-row">
      @foreach($row as $product)
        <div class="product-card">
          <div class="product-image">
            <img src="{{ asset('productImg/' . $product->image_url . '.svg' ) }}"alt="{{ $product->name }}">

            <form method="POST"  class="add-to-cart-form" action="{{ route('cart.add') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="add-to-cart-btn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4V20M4 12H20" stroke="black" stroke-width="2" stroke-linecap="round"/>
                        </svg>
            </button>
            </form>
          </div>
          <h3 class="product-name">
            <a href="{{ route('product.detail', ['id'=>$product->id]) }}">
              {{ $product->name }}
            </a>
          </h3>
          <div class="product-rating">
            {{-- render stars based on $product->rating if you have it --}}
          </div>
          <div class="product-price">
            ${{ number_format($product->price,2) }}
          </div>
        </div>
      @endforeach
    </div>
  @endforeach
    </div>
    
    <!-- Button Section -->
    <div style="text-align: center; margin: 40px 0; border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 20px 0;">
        <a href="#" id="pricelistBtn" style="display: inline-block; background-color: #000; color: white; font-family: 'Abhaya Libre', serif; font-weight: 500; padding: 15px 50px; text-decoration: none; border-radius: 50px; margin-bottom: 20px;">Pricelist</a>  
    </div>
    
    <!-- Modal for Pricelist -->
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
@endsection
 
