<x-main-layout title="Home">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    @endpush
    <div class="container-top">
        <div class="top-left">
            <div class="top-left-text">
                <h2>
                    Local Goods <br>
                    & Crafts
                </h2>
                <a class="btn button" href="/shop">Shop Now</a>
            </div>
        </div>
        <div class="top-right">
            <img src="https://bcwares.s3.us-east-2.amazonaws.com/photos/potter-ceramics-clay-circle-1612485671.jpg"
                alt="photo of a potter throwing a piece of pottery on a potters wheel">
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
                <img src="https://bcwares.s3.us-east-2.amazonaws.com/photos/needleandthread.jpg"
                    alt="photo of needle and thread for crafting">
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
