<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(30); // Adjust the number of items per page as needed

        return view('livewire.products', ['products' => $products]);
    }
}
