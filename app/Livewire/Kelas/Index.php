<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.kelas.index', [
            'datas' => Kelas::get()
        ]);
    }
}
