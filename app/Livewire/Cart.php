<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Cart extends Component
{
    public $products = [];
    public $cartItems = [];

    public function mount()
    {
        // Retrieve the cart cookie
        $cartCookie = $_COOKIE['cart'] ?? null;

        if ($cartCookie) {
            // Parse the cookie using native PHP
            $cart = json_decode($cartCookie, true);

            if (is_array($cart) && !empty($cart)) {
                // Extract product IDs from the cart
                $productIds = array_map(function ($item) {
                    return $item['id'];
                }, $cart);

                // Fetch products from the database
                $placeholders = implode(',', array_fill(0, count($productIds), '?'));
                $sql = "SELECT * FROM products WHERE id IN ($placeholders)";

                // Using Laravel's DB facade for database operations
                $this->products = DB::select($sql, $productIds);

                // Save cart items for reference
                $this->cartItems = $cart;
            }
        }
    }

    public function render()
    {
        return view('livewire.cart', [
            'products' => $this->products,
            'cartItems' => $this->cartItems,
        ]);
    }
}
