<?php

namespace Modules\Core\app\Livewire;

use App\Models\Product;
use Livewire\Component;

class Deleteproduct extends Component
{ 
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function delete()
    {
        $product = Product::findOrFail($this->productId);
        $product->delete();


        // Flash a success message
        session()->flash('message', 'Product deleted successfully!');
        $this->render();

    }

 
    public function render()
    {
        return view('core::livewire.deleteproduct');
    }
}
