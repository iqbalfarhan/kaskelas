<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;
    public $username;
    public $password;

    public function login()
    {
        $valid = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $user = User::where('username', $this->username)->first();
            Session::put('sekolah_id', $user->sekolah_id);
            $this->flash('success', 'Login berhasil. selamat datang');
            return redirect()->route('home');
        } else {
            $this->alert('error', 'Kombinasi username dan password tidak ditemukan');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
