<?php

namespace Modules\Core\app\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product; // Adjust the namespace based on your application's structure

class Displayproductsdashboard extends Component
{
    use WithPagination;

    public $perPage = 6; // Number of products per page

    public function deleteProduct($productId)
    {
        // Find the product by ID and delete it
        $product = Product::find($productId);
        if ($product) {
            $product->delete();
            // Optionally, reset pagination to the first page
            $this->resetPage();
        }
    }

    public function render()
    {
        $products = Product::paginate($this->perPage);

        return view('core::livewire.displayproductsdashboard', [
            'products' => $products,
        ]);
    }
}
