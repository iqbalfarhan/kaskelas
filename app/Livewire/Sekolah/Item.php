<?php

namespace App\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;

class Item extends Component
{
    public Sekolah $sekolah;

    public function render()
    {
        return view('livewire.sekolah.item');
    }
}
