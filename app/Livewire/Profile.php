<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Profile extends Component
{
    use LivewireAlert;
    public $user_id;

    public $name;
    public $nis;
    public $password;
    public $username;

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'nis' => 'required',
            'username' => 'required|unique:users,username,' . auth()->id()
        ]);

        if ($this->password) {
            $valid['password'] = Hash::make($this->password);
        }

        if (User::find($this->user_id)->update($valid)) {
            $this->reset('password');
            $this->alert('success', 'Profile berhasil diupdate');
        }
    }

    public function mount()
    {
        $user = User::find(auth()->id());

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->nis = $user->nis;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
