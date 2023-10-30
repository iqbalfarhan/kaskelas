<?php

namespace App\Livewire\User;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    use LivewireAlert;

    public $user;
    public $sekolah_id;
    public $kelas_id;
    public $show = false;
    public $role;

    public function simpan()
    {
        $this->validate([
            'role' => 'required'
        ]);

        $user = User::find($this->user->id);

        if ($user->syncRoles($this->role)) {
            $this->alert('success', 'Berhasil ganti privilege');
            $this->reset(
                'show'
            );
            $this->dispatch('reload');
        } else {
            $this->alert('error', 'Gagal ganti privilege');
        }
    }

    public function render()
    {
        return view('livewire.user.edit', [
            'roles' => Role::whereNot('name', 'superadmin')->pluck('name'),
            'sekolahs' => Sekolah::pluck('name', 'id'),
            'kelases' => Kelas::when($this->sekolah_id, fn($q) => $q->where('id', $this->sekolah_id))->pluck('name', 'id'),
        ]);
    }
}