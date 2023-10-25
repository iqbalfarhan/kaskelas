<?php

namespace App\Livewire\User;

use App\Models\Kelas;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $cari;
    public $kelas_id;

    protected $listeners = ['reload' => '$refresh'];

    public function mount()
    {
        // $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;
    }

    public function render()
    {
        $datas = User::whereHas('roles', function($role){
            $role->whereIn('name', ['siswa', 'bendahara']);
        })->when($this->cari, function ($q) {
            $q->where('name', 'like', '%' . $this->cari . '%')->orWhere('nis', 'like', '%' . $this->cari . '%');
        })->when($this->kelas_id, function ($q) {
            $q->where('kelas_id', $this->kelas_id);
        })->get();

        return view('livewire.user.index', [
            'datas' => $datas,
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
