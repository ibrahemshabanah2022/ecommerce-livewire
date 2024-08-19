<div>

    <form wire:submit.prevent="addCategory">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label m-2">Category Name</label>
            <input type="text" wire:model="name" class="form-control " id="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
