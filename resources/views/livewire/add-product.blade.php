<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" wire:model="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" wire:model="description"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" wire:model="price">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="in_stock">In Stock</label>
            <input class="form-label" id="in_stock" type="number" wire:model="in_stock">
            @error('in_stock')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" wire:model="category_id">
                <option value="">Choose Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="image">Product Image (optional)</label>
            <input type="file" id="image" wire:model="image">
            @error('image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
