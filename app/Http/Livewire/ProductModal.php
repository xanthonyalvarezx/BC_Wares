<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductModal extends Component
{
    public $isOpen = false;
    public $product = null;

    protected $listeners = ['showProduct' => 'loadProduct'];

    public function loadProduct($productId)
    {
        $this->product = Product::find($productId);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->product = null;
    }

    public function render()
    {
        return view('livewire.product-modal');
    }
}
