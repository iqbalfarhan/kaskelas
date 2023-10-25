<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Livewire\Component;

class Item extends Component
{
    public Kelas $kelas;

    public function render()
    {
        return view('livewire.kelas.item');
    }
}
