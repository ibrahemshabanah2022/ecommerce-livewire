    <div>
        @if (session()->has('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="addCategory" class="m-5  ">
            <div class="mb-4">
                <label for="categoryName" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label><br>
                <input type="text" wire:model="categoryName" id="categoryName" placeholder="Enter Category name"
                    class="form-control">
                @error('categoryName')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Attributes (optionaly):</label>
                @foreach ($attributeNames as $index => $attributeName)
                    <div class="d-flex align-items-center mb-2" wire:key="attribute-{{ $index }}">
                        <input type="text" wire:model="attributeNames.{{ $index }}" class="form-control me-2"
                            placeholder="Enter attribute name">

                        <button type="button" wire:click.prevent="removeAttributeInput({{ $index }})"
                            class="btn btn-danger">X</button>
                    </div>
                    @error('attributeNames.' . $index)
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                @endforeach


            </div>
            <button type="button" wire:click.prevent="addAttributeInput" class="btn btn-secondary ">
                Add New Attribute
            </button>
            <button type="submit" class="btn btn-primary">
                Add Category
            </button>
        </form>

    </div>
