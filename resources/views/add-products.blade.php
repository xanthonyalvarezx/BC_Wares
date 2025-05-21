<x-vendor-layout title="Add Products">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    @endpush
    <div class="container product-form-container">
        <form class="add-product-form" action="/vendor/add/products" method="post" enctype="multipart/form-data">
            <h1 class="text-center">Add Products</h1>
            @csrf
            <input type="number" name="user_id" value="{{ auth()->user()->id }}" hidden>
            <input type="text" name="name" placeholder="Product Name">
            <label for="image_url">Choose a product image:</label>
            <input type="file" name="image_url" multiple>
            <textarea class="product-description" name="description" placeholder="Add a description..."></textarea>
            <input type="text" name="short_desc" placeholder="Short Description">
            <input type="number" name="quantity" id="" placeholder="quantity for purchase">
            <input type="number" name="price" id="" placeholder="price">
            <select name="type" id="">
                <option value="">Choose a product type</option>
                <option value="1">Craft</option>
                <option value="2">Food</option>
                <option value="3">Clothing</option>
                <option value="3">Bath and Body</option>
            </select>
            <button class="button" type="submit">Add</button>
        </form>
    </div>

</x-vendor-layout>
