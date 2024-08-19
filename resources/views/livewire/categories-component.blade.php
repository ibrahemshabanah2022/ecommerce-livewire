<div class="card">
    <h5 class="card-header">All Categories</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i>
                            <strong>{{ $category->name }}</strong>
                        </td>
                        <td>

                            <button wire:click="deleteCategory({{ $category->id }})"
                                onclick="return confirm('Are you sure you want to delete this category?')" type="button"
                                class="btn btn-danger" aria-haspopup="true" aria-expanded="false">
                                Delete
                            </button>
                            <button wire:click="startEdit({{ $category->id }})" type="button" class="btn btn-primary"
                                aria-haspopup="true" aria-expanded="false">
                                Edit
                            </button>

                        </td>
                        <td>
                            @if ($editingCategoryId === $category->id)
                                <div>
                                    <form wire:submit.prevent="saveCategory">
                                        <input type="text" wire:model="name" placeholder="Category Name"
                                            class="form-control">
                                        @error('name')
                                            <span class="error" style="color: red;">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-icon btn-primary">
                                            OK
                                        </button>


                                        <button type="button" class="btn btn-icon btn-danger" wire:click="resetForm">
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
    @if (session()->has('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif
</div>
