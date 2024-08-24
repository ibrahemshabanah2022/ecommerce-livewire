<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class AddProduct extends Component
{
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $in_stock; 
    public $categories;

    protected $rules = [
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'in_stock' => 'required|integer|min:0',
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'in_stock' => $this->in_stock,
        ]);

        session()->flash('message', 'Product added successfully.');

        // Reset the form fields after successful submission
        $this->reset(['name', 'description', 'price', 'category_id', 'in_stock']);
    }

    public function render()
    {
        return view('livewire.add-product');
    }
}
