<?php

namespace App\Livewire\Auth;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Register extends Component
{

    use LivewireAlert;

    public $name;
    public $username;
    public $password;
    public $sekolah_id;
    public $kelas_id;

    public function register()
    {
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'kelas_id' => 'required',
        ]);

        $this->validate([
            'sekolah_id' => 'required'
        ]);

        $newuser = User::create($valid);

        if (Auth::loginUsingId($newuser->id)) {
            $user = User::where('username', $this->username)->first();
            $user->assignRole('siswa');

            Session::put('sekolah_id', $user->sekolah_id);
            $this->flash('success', 'Login berhasil. selamat datang');
            return redirect()->route('home');
        } else {
            $this->alert('error', 'Kombinasi username dan password tidak ditemukan');
        }
    }
    public function render()
    {
        return view('livewire.auth.register', [
            'sekolahs' => Sekolah::pluck('name', 'id'),
            'kelas' => Kelas::where('sekolah_id', $this->sekolah_id)->pluck('name', 'id'),
        ]);
    }
}
