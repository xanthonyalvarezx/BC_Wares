<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use App\Models\Products;
use Livewire\Attributes\On;

/**
 * The ProductModal class handles displaying product details in a modal window.
 * 
 * @property int $productId The ID of the product being displayed
 * @property Products|null $product The product model instance
 * @property bool $visible Controls modal visibility state
 * 
 */
class ProductModal extends Component
{
    public $productId;
    public $product = null;
    public $visible = false;

    /**
     * Shows the modal by setting the visible property to true and loading the product details.
     * 
     * @param int $productId The ID of the product to display
     */
    #[On('show')]
    public function show($productId)
    {
        $this->productId = $productId;
        $this->product = Products::find($productId);
        $this->visible = true;
    }

    /**
     * Hides the modal by setting the visible property to false.
     */
    #[On('hide')]
    public function hide()
    {
        $this->visible = false;
    }

    /**
     * Renders the modal with the product details.
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.modals.product-modal');
    }
}
