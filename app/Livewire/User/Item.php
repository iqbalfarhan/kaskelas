<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Item extends Component
{

    public User $user;

    public $withActions = true;

    protected $listeners = ['reload' => '$refresh'];

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function resetPasswordUser(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.user.item');
    }
}
