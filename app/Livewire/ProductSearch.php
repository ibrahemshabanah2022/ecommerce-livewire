<?php

namespace App\Livewire;


use Livewire\Component;

class ProductSearch extends Component
{
    public $searchTerm;

    public function search()
    {
        return redirect()->route('search.results', ['query' => $this->searchTerm]);
    }

    public function render()
    {
        return view('livewire.product-search');
    }
}
