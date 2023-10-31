<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Sekolah;
use Livewire\Component;

class Index extends Component
{
    public $sekolah_id;
    public function render()
    {
        return view('livewire.kelas.index', [
            'datas' => Kelas::when($this->sekolah_id, fn($q) => $q->where('sekolah_id', $this->sekolah_id))->get(),
            'sekolah' => Sekolah::pluck('name', 'id'),
        ]);
    }
}
