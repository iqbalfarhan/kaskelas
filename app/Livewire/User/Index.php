<?php

namespace App\Livewire\User;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $cari;
    public $kelas_id;
    public $sekolah_id;

    protected $listeners = ['reload' => '$refresh'];

    public function updatedSekolahId()
    {
        $this->kelas_id = '';
    }

    public function mount()
    {
        $this->sekolah_id = auth()->user()->kelas->sekolah_id ?? Sekolah::first()->id;
        $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;
    }

    public function render()
    {
        $datas = User::whereHas('roles', function ($role) {
            $role->whereIn('name', ['siswa', 'bendahara']);
        })->when($this->cari, function ($q) {
            $q->where('name', 'like', '%' . $this->cari . '%')->orWhere('nis', 'like', '%' . $this->cari . '%');
        })->when($this->kelas_id, function ($q) {
            $q->where('kelas_id', $this->kelas_id);
        })->paginate(15);

        return view('livewire.user.index', [
            'datas' => $datas,
            'sekolah' => Sekolah::pluck('name', 'id'),
            'kelases' => $this->sekolah_id ? Kelas::where('sekolah_id', $this->sekolah_id)->pluck('name', 'id') : [],
        ]);
    }
}
