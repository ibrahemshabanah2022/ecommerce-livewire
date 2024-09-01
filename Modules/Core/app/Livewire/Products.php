<?php

namespace Modules\Core\app\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Category;

class Products extends Component
{
   
    use WithPagination;

   

    public $categories;
    public $editingProductId = null;
    public $name;
    public $price;
    public $in_stock;   

    public $category_id;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function deleteProduct($productId)
{
    // Delete the product from the database
    Product::find($productId)->delete();

    // Flash a success message
    session()->flash('message', 'Product deleted successfully.');

    // Update the products list on the screen
    $this->render();
}


    public function restoreProduct($productId)
    {
        $product = Product::withTrashed()->find($productId);
        if ($product) {
            $product->restore();
            session()->flash('message', 'Product restored successfully.');
        } else {
            session()->flash('error', 'Product not found.');
        }
    }

    public function startEdit($productId)
    {
        $product = Product::find($productId);
        $this->editingProductId = $productId;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->in_stock = $product->in_stock;

        
        $this->category_id = $product->category_id;
    }

    public function saveProduct()
    {
        $this->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'in_stock' => 'required|numeric|min:0',

            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::find($this->editingProductId);
        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'in_stock' => $this->in_stock,

            'category_id' => $this->category_id,
        ]);

        $this->resetForm();
        session()->flash('message', 'Product updated successfully.');
    }

    public function resetForm()
    {
        $this->editingProductId = null;
        $this->name = '';
        $this->price = '';
        $this->in_stock = '';

        $this->category_id = '';
    }

    public function render()
    {
        return view('core::livewire.products', [
            'products' => Product::with('category')->withTrashed()->paginate(10)
        ]);
    }
}
