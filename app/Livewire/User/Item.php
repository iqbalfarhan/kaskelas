<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Item extends Component
{
    use LivewireAlert;

    public User $user;

    public $withActions = true;

    protected $listeners = ['reload' => '$refresh'];

    public function deleteUser()
    {
        if ($this->user->delete()) {
            $this->flash('success', 'User dihapus');
            return redirect()->route('user.index');
        } else {
            $this->alert('error', 'User gagal dihapus');
        }
    }

    public function resetPasswordUser()
    {
        if ($this->user->password = Hash::make($this->user->nis)) {
            $this->alert('success', 'Password berhasil di reset ke NIS siswa');
        } else {
            $this->alert('error', 'Password user gagal direset');
        }
    }

    public function render()
    {
        return view('livewire.user.item');
    }
}
