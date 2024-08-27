    <div>
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="addCategory" class="m-5  ">
            <div class="mb-4">
                <label for="categoryName" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label><br>
                <input type="text" wire:model="categoryName" id="categoryName" placeholder="Enter Category name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('categoryName')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Attributes (optionaly):</label>
                @foreach ($attributeNames as $index => $attributeName)
                    <div class="flex items-center mb-2" wire:key="attribute-{{ $index }}">
                        <input type="text" wire:model="attributeNames.{{ $index }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
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
