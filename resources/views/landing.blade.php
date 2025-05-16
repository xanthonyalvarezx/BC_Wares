<x-main-layout title="Home">
    @push('styles')
        <link rel="stylesheet" href="{{ secure_asset('css/landing.css') }}">
    @endpush
    <div class="container-top">
        <div class="top-left">
            <div class="top-left-text">
                <h2>
                    Local Goods <br>
                    & Crafts
                </h2>
                <button class="shop-now-button">Shop Now</button>
            </div>
        </div>
        <div class="top-right">
            <img src="https://placehold.co/300" alt="">
        </div>
    </div>
    <div class="container-middle">
        <div class="middle-left">
            <h2 class="middle-left-text">Our Story</h2>
            <p>We're dedicated to working with local artisans to offer unique handmade products made in your local area.
            </p>
        </div>
        <div class="middle-right">
            <div class="top-right">
                <img src="https://placehold.co/300" alt="">
            </div>
        </div>
    </div>
    <div class="container-bottom">
        <div class="container-bottom-heading">
            <span>
                <h2>Featured Products</h2>
            </span>
        </div>
        <div class="featured-products">
            <div class="featured-image">
                <img src="https://placehold.co/300" alt="">
            </div>
            <div class="featured-image">
                <img src="https://placehold.co/300" alt="">
            </div>
            <div class="featured-image">
                <img src="https://placehold.co/300" alt="">
            </div>
        </div>
    </div>

</x-main-layout>
