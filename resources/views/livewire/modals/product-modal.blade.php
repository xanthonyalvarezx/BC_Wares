<div x-cloak>
    <x-modal-wrapper wire:model="visible">
        <div class="modal-inner">
            <span class="modal-exit" x-data x-on:click="$wire.hide()">
                <i class="bi bi-x-circle-fill"></i>
            </span>
            @if ($product)
                <div class="product-modal-content">
                    <div class="product-image-section">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded">
                    </div>
                    <div class="product-details-section">
                        <h2 class="product-title">{{ $product->name }}</h2>
                        <p class="product-price">${{ number_format($product->price, 2) }}</p>
                        <div class="product-description">
                            <h4>Description</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="product-meta">
                            <p class="quantity">Stock: {{ $product->quantity }} available</p>
                            <p class="short-desc">{{ $product->short_desc }}</p>
                        </div>
                        <div class="product-actions">
                            <a href="/shop/cart/add/{{ $product->id }}" class="btn btn-primary">Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center p-4">
                    <p>Loading product details...</p>
                </div>
            @endif
        </div>
    </x-modal-wrapper>
</div>
