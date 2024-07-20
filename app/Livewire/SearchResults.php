<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class SearchResults extends Component
{
    use WithPagination;

    public $query;

    public function mount($query)
    {
        $this->query = $query;
    }

    public function render()
    {
        $categories = Category::all(); // Fetch all categories

        $products = Product::where('name', 'like', '%' . $this->query . '%')
            ->paginate(10);

        return view('livewire.search-results', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
