<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $showCheckoutButton = false;

    public function proceedToCheckout($cartItems)
    {
        // Get the authenticated user ID
        $userId = Auth::id();

        // Check if the user already has a cart to prevent duplicate entries
        $existingCart = Cart::where('user_id', $userId)->first();

        if (!$existingCart) {
            // Create a new cart for the user
            $cart = Cart::create([
                'user_id' => $userId,
            ]);
        } else {
            $cart = $existingCart;
        }

        // Save each cart item in the CartItem table
        foreach ($cartItems as $item) {
            // Check if the product already exists in the cart items
            $existingCartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $item['id'])
                ->first();

            if (!$existingCartItem) {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                ]);
            }
        }


        $this->showCheckoutButton = true;

        session()->flash('message', 'Your Order Has Been Placed successfully!');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
