<?php

namespace App\Livewire;


use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class WishlistProducts extends Component
{
    public $product;
    public $addedToWishlist = true;
    public $wishlistProducts;

    public function mount()
    {
        // Fetch the products from the wishlist table for the authenticated user
        $this->wishlistProducts = Wishlist::where('user_id', Auth::id())
            ->with('product')
            ->get()
            ->map(function ($wishlist) {
                return $wishlist->product;
            });
    }
    public function destroy($product_id)
    {
        $user_id = auth()->id(); // Assuming the user is authenticated

        Wishlist::where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->delete();

        return response()->json(['success' => 'Product removed from wishlist successfully.']);
    }
    // public function removeWishlistProduct($productId)
    // {
    //     if (Auth::check()) {
    //         Wishlist::where('user_id', Auth::id())
    //             ->where('product_id', $productId)
    //             ->delete();

    //         // Remove the product from the list in the component
    //         $this->wishlistProducts = $this->wishlistProducts->filter(function ($product) use ($productId) {
    //             return $product->id != $productId;
    //         });
    //     } else {
    //         return redirect()->route('login'); // Replace 'login' with your login route name
    //     }
    // }

    public function render()
    {
        return view('livewire.wishlist-products');
    }
}
