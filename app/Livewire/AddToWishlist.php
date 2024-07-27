<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth; // Assuming authentication is set up

class AddToWishlist extends Component
{
    public $product; // Assuming you'll pass the product to the component
    public $addedToWishlist = false;

    public function mount($product)
    {
        $this->product = $product;

        // Check if already in wishlist on component mount
        $this->addedToWishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $this->product->id)
            ->exists();
    }

    public function toggleWishlist()
    {
        if (Auth::check()) {
            if ($this->addedToWishlist) {
                // Remove from wishlist
                Wishlist::where('user_id', Auth::id())
                    ->where('product_id', $this->product->id)
                    ->delete();

                $this->addedToWishlist = false;
            } else {
                // Add to wishlist
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $this->product->id,
                ]);

                $this->addedToWishlist = true;
            }
        } else {
            // Handle cases where the user is not logged in (e.g., redirect to login)
            return redirect()->route('login'); // Replace 'login' with your login route name
        }
    }

    public function render()
    {
        return view('livewire.add-to-wishlist');
    }
}
