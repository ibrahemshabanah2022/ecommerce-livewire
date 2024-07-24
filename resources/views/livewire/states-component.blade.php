<div>
    <select wire:model="selectedCountry">
        <option value="">Select State</option>
        @foreach ($states as $state)
            <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
    </select>

    <livewire:cities-component :selectedState="$selectedState" />
</div>
