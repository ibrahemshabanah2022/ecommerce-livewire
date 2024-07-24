<?php

namespace App\Livewire;


use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\DB;
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
        ///////////////////

        $user = Auth::user();

        // Get the cart for the user
        $cart = $user->cart;

        // Get the cart product 
        $cartProducts = $cart->cartItems()->get();
        // dd($cartProducts);
        // $products = Product::whereIn('id', $cartProducts->pluck('product_id'))->get();

        $totalprice = 0;
        foreach ($cartProducts as $cartProduct) {
            $totalprice += $cartProduct->quantity * $cartProduct->product->price;
        }

        $user_id = $user->id;


        $order = new Order();
        $order->status = 'unpaid';
        $order->total = $totalprice;
        $order->user_id =  $user_id;
        $order->save();
        // Save the products that the user ordered
        foreach ($cartProducts as $cartProduct) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'Product_id' => $cartProduct->product->id,
                'price' => $cartProduct->product->price,

                'quantity' => $cartProduct->quantity,
            ]);
        };

        // return response()->json([
        //     'url' =>  $checkout_session->url
        // ]);
        session(['orderid' => $order->id]);

        session()->flash('message', 'Your Order Has Been Placed successfully!');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
