<x-vendor-layout>
    <div class="products-div">
        <h1 class="text-center mb-5">My Products</h1>
        <div class="container product-card-container">

            @if ($products != null)
                @foreach ($products as $product)
                    <div class="card product-card">
                        <h5>{{ $product->name }}</h5>
                        <img class="product-image" src="{{ $product->image_url }}" alt="" width="300px">
                        <span>{{ $product->shor_desc }}</span>
                        <span>${{ number_format($product->price, 2) }}</span>
                        <div>
                            <a href="#">Edit product</a>
                            <a href="#">Remove product</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h5>You haven't uploaded any products yet!</h5>
                Click <a href="/add/products">here!</a> to upload your awesome products and start selling today!
            @endif
        </div>
    </div>
</x-vendor-layout>
