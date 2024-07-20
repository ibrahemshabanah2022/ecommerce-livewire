<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class Navbar extends Component
{
    public function render()
    {
        $categories = Category::all(); // Fetch all categories

        return view('livewire.navbar', [

            'categories' => $categories,
        ]);
    }
}
