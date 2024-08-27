<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Attribute;

class AddCategory extends Component
{
    public $categoryName;
    public $attributeNames = ['']; // Array to store multiple attribute names

    protected $rules = [
        'categoryName' => 'required|string|max:255|unique:categories,name',
        'attributeNames.*' => 'string|max:255|unique:attributes,name',
    ];

    public function addAttributeInput()
    {
        $this->attributeNames[] = '';
    }

    public function removeAttributeInput($index)
    {
        unset($this->attributeNames[$index]);
        $this->attributeNames = array_values($this->attributeNames); // Re-index array
    }

    public function addCategory()
    {
        $this->validate();

        // Create the category
        $category = Category::create([
            'name' => $this->categoryName,
        ]);

        // Create and attach attributes
        foreach ($this->attributeNames as $attributeName) {
            $attribute = Attribute::create([
                'name' => $attributeName,
            ]);

            $category->attributes()->attach($attribute->id);
        }

        // Clear the input fields
        $this->reset(['categoryName', 'attributeNames']);
        $this->attributeNames = ['']; // Reset to one empty input

        session()->flash('message', 'Category and attributes added successfully!');
    }

    public function render()
    {
        return view('livewire.add-category');
    }
}