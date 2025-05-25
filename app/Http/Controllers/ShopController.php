<?php

namespace App\Http\Controllers;

use session;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public $cart = [];

    public function getCart() {}

    public function addToCart($id)
    {
        // Check if user is logged in
        if (!Auth::guard('customer')->check()) {
            return redirect('/login')->with('error', 'Please login to add items to cart');
        }

        // get product
        $product = Products::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Get or create cart for the customer
        $userCart = Cart::firstOrCreate(
            ['customer_id' => Auth::guard('customer')->id()],
            ['cart' => json_encode([])]
        );

        // Get current cart contents
        $currentCart = json_decode($userCart->cart, true) ?? [];

        // Add or update product in cart
        if (isset($currentCart[$product->id])) {
            $currentCart[$product->id]['quantity']++;
        } else {
            $currentCart[$product->id] = [
                'quantity' => 1,
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image_url' => $product->image_url
                ]
            ];
        }
        session()->put('cart', $currentCart);
        session()->save();

        // Update cart
        $userCart->cart = json_encode($currentCart);
        $userCart->save();

        return redirect()->back()->with('success', $product->name . ' added to cart');
    }
}
