<div class="card">
    <h5 class="card-header">All Users</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <strong>{{ $user->name }}</strong>
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <button wire:click="deleteUser({{ $user->id }})"
                                onclick="return confirm('Are you sure you want to delete this user?')" type="button"
                                class="btn btn-danger">
                                Delete
                            </button>
                            {{-- <button wire:click="startEdit({{ $user->id }})" type="button" class="btn btn-primary">
                                Edit
                            </button> --}}
                        </td>
                        <td>
                            @if ($editingUserId === $user->id)
                                <div>
                                    <form wire:submit.prevent="saveUser">
                                        <input type="text" wire:model="name" placeholder="User Name"
                                            class="form-control">
                                        <input type="email" wire:model="email" placeholder="Email"
                                            class="form-control mt-2">
                                        @error('name')
                                            <span class="error" style="color: red;">{{ $message }}</span>
                                        @enderror
                                        @error('email')
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
    <div class="mt-3">
        {{ $users->links() }}
    </div>
    @if (session()->has('message'))
        <div style="color: green;">
            {{ session('message') }}
        </div>
    @endif
</div>
