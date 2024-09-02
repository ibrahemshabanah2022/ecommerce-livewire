<div class="m-4 p-4">
    <h5 class="card-header">All Products</h5>

    <div class="card mb-4">

        <div class="card">

            <a wire:navigate href="{{ route('trashed-products') }}" class="card-header"
                style="color: red; text-decoration: none;">
                Trashed Products
            </a>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>In Stock</th>


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



                                    <div class="d-flex align-items-center">
                                        <button wire:click="deleteProduct({{ $product->id }})" type="button"
                                            class="btn btn-danger m-2">
                                            Delete
                                        </button>
                                        {{-- <livewire:core.deleteproduct :product-id="$product->id" /> --}}

                                        <a href="{{ route('edit.product', ['productId' => $product->id]) }}"
                                            class="btn btn-primary ml-2">
                                            Edit
                                        </a>
                                    </div>
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

    </div>
</div>
