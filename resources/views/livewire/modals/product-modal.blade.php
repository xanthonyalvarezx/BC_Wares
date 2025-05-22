<x-modal-wrapper wire:model="visible">
    <span class="modal-exit" x-data x-on:click="Livewire.dispatchTo('modals.product-modal', 'hide')"><i
            class="bi bi-x-circle-fill"></i></span>
    <div class="d-flex">
        <div>
            <h1>{{ $product }}</h1>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
        </div>
        <div>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
            <h1>Product Details</h1>
        </div>
    </div>
</x-modal-wrapper>
