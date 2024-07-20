<?php

namespace App\Livewire;


use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsByCategory extends Component
{
    use WithPagination;

    public $categoryId;
    public $perPage = 30;

    public function mount($id)
    {
        $this->categoryId = $id;
    }

    public function loadMore()
    {
        $this->perPage += 30;
    }

    public function render()
    {
        $category = Category::find($this->categoryId);
        $products = Product::where('category_id', $this->categoryId)->paginate($this->perPage);
        $categories = Category::all(); // Fetch all categories

        return view('livewire.products-by-category', [
            'products' => $products,
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}
