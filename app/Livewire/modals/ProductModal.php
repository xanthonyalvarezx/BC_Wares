<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use App\Models\Products;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use Livewire\Attributes\On;

class ProductModal extends Component
{
    public $productId;
    public $product = null;
    public $visible = false;
    #[On('show')]
    public function show($productId)
    {
        $this->productId = $productId;
        $this->product = Products::find($productId);
        $this->visible = true;
    }

    #[On('hide')]

    public function hide()
    {
        $this->visible = false;
    }
    public function render()
    {

        $this->product = Products::find($this->productId);
        return view('livewire.modals.product-modal', ['product' => $this->product]);
    }
}
