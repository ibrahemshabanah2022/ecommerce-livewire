<?php
namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AllProducts extends Component
{
    use WithPagination;

    public $categories;
    public $editingProductId = null;
    public $name;
    public $price;
    public $category_id;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function deleteProduct($productId)
    {
        Product::find($productId)->delete();
        session()->flash('message', 'Product deleted successfully.');
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
        $this->category_id = $product->category_id;
    }

    public function saveProduct()
    {
        $this->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::find($this->editingProductId);
        $product->update([
            'name' => $this->name,
            'price' => $this->price,
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
        $this->category_id = '';
    }

    public function render()
    {
        return view('livewire.all-products', [
            'products' => Product::with('category')->withTrashed()->paginate(10)
        ]);
    }
}
