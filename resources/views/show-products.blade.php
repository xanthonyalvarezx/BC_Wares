<x-vendor-layout :products="$products">


    <div class="products-div">
        <h1 class="text-center mb-5">My Products</h1>
        <div class="container product-card-container">

            @if ($products != null)
                @foreach ($products as $product)
                    <div class="card product-card">
                        <h5>Current title: {{ $product->name }}</h5>
                        <img class="product-image" src="{{ $product->image_url }}" alt="" width="300px">

                        <span> Description: {{ $product->description }}</span>
                        <span> Short Description: {{ $product->short_desc }}</span>
                        <span> Listed Price: ${{ number_format($product->price, 2) }}</span>
                        <div class="d-flex justify-content-between w-100">
                            <button type="button" class="button edit-product-button" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $product->id }}">
                                Edit product
                            </button>
                            <form action="/vendor/delete/product/{{ $product->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal for each product -->
                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
                        aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product:
                                        {{ $product->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editForm{{ $product->id }}"
                                        action="/vendor/edit/product/{{ $product->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="name{{ $product->id }}" class="form-label">Product
                                                Name</label>
                                            <input type="text" class="form-control" id="name{{ $product->id }}"
                                                name="name" value="{{ $product->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="price{{ $product->id }}" class="form-label">Price</label>
                                            <input type="number" step="0.01" class="form-control"
                                                id="price{{ $product->id }}" name="price"
                                                value="{{ $product->price }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description{{ $product->id }}"
                                                class="form-label">Description</label>
                                            <textarea class="form-control" id="description{{ $product->id }}" name="description" rows="3">{{ $product->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="short_desc{{ $product->id }}" class="form-label">Short
                                                Description</label>
                                            <input type="text" class="form-control"
                                                id="short_desc{{ $product->id }}" name="short_desc"
                                                value="{{ $product->short_desc }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity{{ $product->id }}"
                                                class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity{{ $product->id }}"
                                                name="quantity" value="{{ $product->quantity }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type{{ $product->id }}" class="form-label">Product
                                                Type</label>
                                            <select class="form-control" id="type{{ $product->id }}" name="type">
                                                <option value="1" {{ $product->type == 1 ? 'selected' : '' }}>
                                                    Craft</option>
                                                <option value="2" {{ $product->type == 2 ? 'selected' : '' }}>Food
                                                </option>
                                                <option value="3" {{ $product->type == 3 ? 'selected' : '' }}>
                                                    Clothing</option>
                                                <option value="4" {{ $product->type == 4 ? 'selected' : '' }}>Bath
                                                    and Body</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image{{ $product->id }}" class="form-label">Product
                                                Image</label>
                                            <div class="d-flex align-items-center gap-3 mb-2">
                                                <img src="{{ $product->image_url }}" alt="Current product image"
                                                    class="img-thumbnail" style="max-width: 100px;">
                                                <span class="text-muted">Current image</span>
                                            </div>
                                            <input type="file" class="form-control" id="image{{ $product->id }}"
                                                name="image_url" accept="image/*">
                                            <small class="text-muted">Leave empty to keep current image</small>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" form="editForm{{ $product->id }}"
                                        data-bs-dismiss="modal" class="button">Save
                                        changes</button>
                                </div>
                            </div>
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
