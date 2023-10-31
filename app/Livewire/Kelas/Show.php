<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $cari;
    public Kelas $kelas;

    protected $listeners = ['reload' => '$refresh'];

    public function mount()
    {
        // $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;
    }

    public function render()
    {
        $datas = User::where('kelas_id', $this->kelas->id)->whereHas('roles', function ($role) {
            $role->whereIn('name', ['siswa', 'bendahara']);
        })->when($this->cari, function ($q) {
            $q->where('name', 'like', '%' . $this->cari . '%')->orWhere('nis', 'like', '%' . $this->cari . '%');
        })->get();

        return view('livewire.kelas.show', [
            'datas' => $datas,
        ]);
    }
}
