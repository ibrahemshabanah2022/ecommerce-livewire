<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\City;

class CitiesComponent extends Component
{
    protected $listeners = ['stateSelected' => 'updateCities'];

    public $cities = [];
    public $selectedState;

    public function updateCities($stateId)
    {
        $this->selectedState = $stateId;
        $this->cities = City::where('state_id', $stateId)->where('status', 'active')->get();
    }

    public function render()
    {
        return view('livewire.cities-component');
    }
}
