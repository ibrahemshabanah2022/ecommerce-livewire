<?php

namespace Modules\Core\app\Livewire;

use App\Models\Product;
use Livewire\Component;

class Trashedproducts extends Component
{
    public function render()
    {
        $products = Product::onlyTrashed()->paginate(10);

        return view('core::livewire.trashedproducts', [
            'products' => $products,
        ]);

        
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();
    }
}
