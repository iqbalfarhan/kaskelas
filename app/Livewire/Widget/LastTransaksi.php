<?php

namespace App\Livewire\Widget;

use App\Models\Transaksi;
use Livewire\Component;

class LastTransaksi extends Component
{
    public $kelas_id;

    public function render()
    {
        return view('livewire.widget.last-transaksi', [
            'datas' => Transaksi::where('kelas_id', $this->kelas_id)->limit(5)->latest()->get()
        ]);
    }
}
