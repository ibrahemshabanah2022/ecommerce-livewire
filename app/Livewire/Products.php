<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $perPage = 30;

    public function loadMore()
    {
        $this->perPage += 30;
    }

    public function render()
    {
        $products = Product::paginate($this->perPage); // Adjust the number of items per page as needed
        $categories = Category::all(); // Fetch all categories

        return view('livewire.products-component', [
            'products' => $products,
            'categories' => $categories,


        ]);
    }
}
