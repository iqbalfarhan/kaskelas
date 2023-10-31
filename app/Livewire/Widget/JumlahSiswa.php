<?php

namespace App\Livewire\Widget;

use App\Models\Kelas;
use Livewire\Component;

class JumlahSiswa extends Component
{
    public Kelas $kelas;

    public function render()
    {
        return view('livewire.widget.jumlah-siswa');
    }
}
