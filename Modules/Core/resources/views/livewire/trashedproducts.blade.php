<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card w-75">
        <div class="card-body">
            <h2 class="card-title">Trashed Products</h2>

            @if ($products->isEmpty())
                <p>No trashed products found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <button class="btn btn-primary"
                                        wire:click="restore({{ $product->id }})">Restore</button>
                                    <button class="btn btn-danger" wire:click="forceDelete({{ $product->id }})">Delete
                                        Permanently</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->links() }}
            @endif
        </div>
    </div>
</div>
