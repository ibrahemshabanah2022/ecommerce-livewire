<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Country;

class CountriesComponent extends Component
{
    public $countries;
    public $selectedCountry;

    public function mount()
    {
        $this->countries = Country::where('status', 'active')->get();
    }

    public function render()
    {
        return view('livewire.countries-component');
    }
}
