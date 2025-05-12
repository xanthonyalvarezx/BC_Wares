<x-main-layout title="Shop">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
        <div class="shop-outer-wrapper">
            <div class="filters">
                <p>Filters:</p>
                <select class="filter-select" name="" id="">
                    <option value="">Product Category</option>
                </select>
                <select class="filter-select" name="" id="">
                    <option value="">Price</option>
                </select>
                <select class="filter-select" name="" id="">
                    <option value="">Vendor</option>
                </select>
            </div>
            <div class="product-wrapper">
                <div class="product-card">
                    <div>
                        <h3 class="title">title</h3>
                    </div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#productModal"><img class="product-image"
                            src="https://placehold.co/300" alt="" width="350px"></a></a>
                    <p class="price">price</p>
                </div>
            </div>
        </div>
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </x-main-layout>
