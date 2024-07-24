<div>
    <select wire:model="selectedState">
        <option value="">Select City</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>
</div>
