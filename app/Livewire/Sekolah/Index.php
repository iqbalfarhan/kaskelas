<?php

namespace App\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['reload' => '$refresh'];

    public function deleteSekolah(Sekolah $sekolah)
    {
        $sekolah->delete();
    }

    public function render()
    {
        return view('livewire.sekolah.index', [
            'datas' => Sekolah::get()
        ]);
    }
}
