<?php

namespace Modules\Core\app\Livewire;

use App\Models\Product;
use Livewire\Component;

class Editproduct extends Component
{

    public $productId;
    public $name;
    public $price;
    public $in_stock;
    public $category_id;

    public function mount($productId)
    {
        // Load the product
        $product = Product::findOrFail($productId);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->in_stock = $product->in_stock;
        $this->category_id = $product->category_id;
    }

  

    public function saveProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'in_stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Save the updated product information
        $product = Product::findOrFail($this->productId);
        $product->name = $this->name;
        $product->price = $this->price;
        $product->in_stock = $this->in_stock;
        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('success', 'Product updated successfully!');

        // Redirect to the product listing page
        return redirect()->route('AdminProductsPage');
    }
    public function render()
{
    $categories = \App\Models\Category::all();

    return view('core::livewire.editproduct', ['categories' => $categories]);
}

}
