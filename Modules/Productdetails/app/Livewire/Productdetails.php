<?php

namespace Modules\Productdetails\app\Livewire;

use App\Models\Product;
use Livewire\Component;

class Productdetails extends Component
{

    public $product;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('productdetails::livewire.productdetails', [
            'product' => $this->product,
        ]);
    }

    
}
