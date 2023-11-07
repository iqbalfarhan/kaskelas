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

    public User $user;
    public $sekolah_id;
    public $kelas_id;
    public $show = false;
    public $role;
    public $active;

    public function simpan()
    {
        $this->validate([
            'role' => 'required',
            'kelas_id' => 'required',
        ]);

        $user = User::find($this->user->id);

        if ($user->syncRoles($this->role)) {
            $this->alert('success', 'Berhasil ganti privilege');
            $user->update([
                'kelas_id' => $this->kelas_id,
                'active' => $this->active == "true" ? true : false,
            ]);
            $this->reset(
                'show'
            );
            $this->dispatch('reload');
        } else {
            $this->alert('error', 'Gagal ganti privilege');
        }
    }

    public function mount($user)
    {
        $this->user = $user;

        $this->kelas_id = $user->kelas_id;
        $this->active = $user->active ? true : false;
        $this->sekolah_id = $user->sekolah->id;
        $this->role = $user->getRoleNames()->first();
    }

    public function render()
    {
        return view('livewire.user.edit', [
            'roles' => Role::whereNot('name', 'superadmin')->pluck('name'),
            'sekolahs' => Sekolah::pluck('name', 'id'),
            'kelases' => Kelas::when($this->sekolah_id, fn($q) => $q->where('sekolah_id', $this->sekolah_id))->pluck('name', 'id'),
        ]);
    }
}