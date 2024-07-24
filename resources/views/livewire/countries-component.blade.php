<div>
    <select wire:model="selectedCountry">
        <option value="">Select Country</option>
        @foreach ($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
        @endforeach
    </select>

    <livewire:states-component :selectedCountry="$selectedCountry" />
</div>
