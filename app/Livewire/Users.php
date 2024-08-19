<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

    public $editingUserId = null;
    public $name;
    public $email;

    protected $rules = [
        'name' => 'required|string|max:100',
        'email' => 'required|email|max:255',
    ];

    public function mount()
    {
        // Optionally initialize any necessary data
    }

    public function deleteUser($userId)
    {
        User::find($userId)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

    public function startEdit($userId)
    {
        $user = User::find($userId);
        $this->editingUserId = $userId;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function saveUser()
    {
        $this->validate();

        $user = User::find($this->editingUserId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->resetForm();
        session()->flash('message', 'User updated successfully.');
    }

    public function resetForm()
    {
        $this->editingUserId = null;
        $this->name = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate(10)
        ]);
    }
}
