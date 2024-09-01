<x-app-layout>


    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <livewire:layout.navigation />

            <div class="table-responsive text-nowrap card m-5 p-5">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <h1>Edit Product: {{ $name }}</h1>

                <form wire:submit.prevent="saveProduct">
                    <div class="form-group">
                        <label for="name">Product Name:</label>
                        <input type="text" id="name" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" id="price" wire:model="price" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="in_stock">In Stock:</label>
                        <input type="text" id="in_stock" wire:model="in_stock" class="form-control">
                        @error('in_stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" wire:model="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('AdminProductsPage') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>


</x-app-layout>
