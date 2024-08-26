<div class="card">
    <h5 class="card-header">All Products</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>In Stock</th>

                    <th>Status</th>

                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <strong>{{ $product->name }}</strong>
                        </td>
                        <td>
                            ${{ number_format($product->price, 2) }}
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td>
                            {{ $product->in_stock }}
                        </td>
                        <td>
                            @if ($product->trashed())
                                <span style="color: red;">Deleted</span>
                            @endif


                        </td>
                        <td>

                            @if ($product->trashed())
                                <button class="btn btn-success"
                                    wire:click="restoreProduct({{ $product->id }})">Restore</button>
                            @else
                                <button wire:click="deleteProduct({{ $product->id }})"
                                    onclick="return confirm('Are you sure you want to delete this product?')"
                                    type="button" class="btn btn-danger">
                                    Delete
                                </button>
                                <button wire:click="startEdit({{ $product->id }})" type="button"
                                    class="btn btn-primary">
                                    Edit
                                </button>
                            @endif
                        </td>
                        <td>
                            @if ($editingProductId === $product->id)
                                <div>
                                    <form wire:submit.prevent="saveProduct">
                                        <input type="text" wire:model="name" placeholder="Product Name"
                                            class="form-control">
                                        <input type="text" wire:model="price" placeholder="Price"
                                            class="form-control mt-2">
                                        <input type="text" wire:model="in_stock" placeholder="in_stock"
                                            class="form-control mt-2">
                                        <select wire:model="category_id" class="form-control mt-2">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('name')
                                            <span class="error" style="color: red;">{{ $message }}</span>
                                        @enderror
                                        @error('price')
                                            <span class="error" style="color: red;">{{ $message }}</span>
                                        @enderror
                                        @error('in_stock')
                                            <span class="error" style="color: red;">{{ $message }}</span>
                                        @enderror
                                        @error('category_id')
                                            <span class="error" style="color: red;">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-icon btn-primary mt-2">
                                            OK
                                        </button>
                                        <button type="button" class="btn btn-icon btn-danger mt-2"
                                            wire:click="resetForm">
                                            x
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>


    @if (session()->has('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
</div>
