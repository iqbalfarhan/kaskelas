<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.transaksi.index', [
            'datas' => Transaksi::latest()->get(),
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
