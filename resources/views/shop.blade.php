<x-main-layout title="Shop">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
        <h2 class="text-center">BC Wares Artisan Market</h2>
        <div class="shop-outer-wrapper">
            <div class="filters">
                <p>Filters:</p>
                <select class="filter-select" name="" id="">
                    <option value="">Product Category</option>
                    <option value="1">Crafts</option>
                    <option value="2">Food</option>
                    <option value="3">Clothing and Accessories</option>
                    <option value="4">Bath and Body</option>
                </select>
                <select class="filter-select" name="" id="">
                    <option value="">Price</option>
                    <option value="">Lowest to Highest</option>
                    <option value="">Highest to Lowest</option>
                </select>
                <select class="filter-select" name="" id="">
                    <option value="">Vendor</option>
                </select>
            </div>
            <div class="product-wrapper">
                @foreach ($products as $product)
                    <div class="product-card">
                        <div>
                            <h3 class="title">{{ $product->name }}</h3>
                        </div>
                        <a href="#" x-data
                            x-on:click="Livewire.dispatchTo('modals.product-modal', 'show', [{{ $product->id }}])"><img
                                class="product-image" src="{{ $product->image_url }}" alt="" width="350px"></a></a>
                        <p class="price">${{ number_format($product->price, 2) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </x-main-layout>
