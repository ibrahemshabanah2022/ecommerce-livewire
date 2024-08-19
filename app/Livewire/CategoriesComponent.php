<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesComponent extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function deleteCategory($categoryId)
    {
        // Find the category by ID and delete it
        $category = Category::findOrFail($categoryId);
        $category->delete();

        // Refresh the list of categories
        $this->categories = Category::all();
    }



    public function render()
    {
        return view('livewire.categories-component');
    }
}
