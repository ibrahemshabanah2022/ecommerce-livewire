<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesComponent extends Component
{
    public $categories;
    public $editingCategoryId = null;
    public $name;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function startEdit($categoryId)
    {
        // Load category data for editing
        $category = Category::findOrFail($categoryId);
        $this->editingCategoryId = $category->id;
        $this->name = $category->name;
    }

    public function saveCategory()
    {
        // Validate the name field
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
        ]);

        if ($this->editingCategoryId) {
            $category = Category::findOrFail($this->editingCategoryId);
            $category->name = $this->name;
            $category->save();

            // Reset the form and state
            $this->resetForm();

            // Refresh the list of categories
            $this->categories = Category::all();
        } else {
            session()->flash('error', 'Category ID is missing.');
        }
    }

    public function resetForm()
    {
        $this->editingCategoryId = null;
        $this->name = '';
    }

    public function deleteCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $category->delete();

        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.categories-component');
    }
}
