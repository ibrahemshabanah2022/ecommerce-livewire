<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category; // Assuming you have a Category model
use Illuminate\Validation\Rule;

class AddCategory extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
    ];

    public function addCategory()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        // Clear the input field
        $this->reset('name');

        // Optionally, you can add a flash message or emit an event
        session()->flash('message', 'Category added successfully!');
    }

    public function render()
    {
        return view('livewire.add-category');
    }
}
