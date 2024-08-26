<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="addCategory">
        <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" id="categoryName" wire:model.defer="categoryName" class="form-control">
            @error('categoryName')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="attributeName">Attribute Name</label>
            <input type="text" id="attributeName" wire:model.defer="attributeName" class="form-control">
            @error('attributeName')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Category and Attribute</button>
    </form>
</div>
