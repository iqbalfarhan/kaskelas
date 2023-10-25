<?php

namespace App\Livewire;

use App\Models\Kelas;
use Livewire\Component;

class Home extends Component
{
    public $kelas_id;

    public function mount()
    {
        $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;
    }

    public function render()
    {
        return view('livewire.home', [
            'kelas' => Kelas::find($this->kelas_id),
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
