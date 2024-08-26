<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Validation\Rule;

class AddCategory extends Component
{
    public $categoryName;
    public $attributeName;

    protected $rules = [
        'categoryName' => 'required|string|max:255|unique:categories,name',
        'attributeName' => 'required|string|max:255|unique:attributes,name',
    ];

    public function addCategory()
    {
        $this->validate();

        // Create the category
        $category = Category::create([
            'name' => $this->categoryName,
        ]);

        // Create the attribute
        $attribute = Attribute::create([
            'name' => $this->attributeName,
        ]);

        // Attach the attribute to the newly created category
        $category->attributes()->attach($attribute->id);

        // Clear the input fields
        $this->reset(['categoryName', 'attributeName']);

        // Optionally, you can add a flash message or emit an event
        session()->flash('message', 'Category and attribute added successfully!');
    }

    public function render()
    {
        return view('livewire.add-category');
    }
}
