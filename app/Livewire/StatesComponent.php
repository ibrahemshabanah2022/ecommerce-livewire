<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\State;

class StatesComponent extends Component
{
    protected $listeners = ['statesUpdated' => '$refresh'];

    public $states = [];
    public $selectedCountry;
    public $selectedState; // Add this property

    public function updatedSelectedCountry($countryId)
    {
        $this->states = State::where('country_id', $countryId)->where('status', 'active')->get();
        $this->emit('statesUpdated'); // Notify CitiesComponent to reset
    }

    public function updatedSelectedState($stateId)
    {
        $this->emit('stateSelected', $stateId); // Emit an event when the state is selected
    }

    public function render()
    {
        return view('livewire.states-component');
    }
}
