<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use App\Models\Products;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;

class EditProductModal extends Component
{
    use WithFileUploads;

    public $productId;
    public $product = null;
    public $visible = false;
    public $name;
    public $price;
    public $description;
    public $short_desc;
    public $quantity;
    public $type;
    public $image_url;

    #[On('show')]
    public function show($productId)
    {
        $this->productId = $productId;
        $this->product = Products::find($productId);
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->description = $this->product->description;
        $this->short_desc = $this->product->short_desc;
        $this->quantity = $this->product->quantity;
        $this->type = $this->product->type;
        $this->visible = true;
    }

    #[On('hide')]
    public function hide()
    {
        $this->visible = false;
        $this->reset();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'description' => 'required|min:10',
            'short_desc' => 'required|min:5',
            'quantity' => 'required|integer|min:0',
            'type' => 'required|integer|min:1|max:4',
            'image_url' => 'nullable|image|max:1024'
        ]);

        $product = Products::find($this->productId);

        $product->name = $this->name;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->short_desc = $this->short_desc;
        $product->quantity = $this->quantity;
        $product->type = $this->type;

        if ($this->image_url) {
            $path = $this->image_url->store('products', 'public');
            $product->image_url = '/storage/' . $path;
        }

        $product->save();

        $this->dispatch('productUpdated');
        $this->hide();
    }

    public function render()
    {
        return view('livewire.modals.edit-product-modal');
    }
}
