<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class Orders extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function render()
    {
        $orders = Order::with('orderItems.product')
            ->paginate($this->perPage);

        return view('livewire.orders', [
            'orders' => $orders
        ]);
    }
}
