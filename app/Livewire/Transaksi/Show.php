<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;

class Show extends Component
{
    public Transaksi $transaksi;
    public $show = false;

    #[On("showTransaksi")]
    public function showTransaksi(Transaksi $transaksi)
    {
        $this->transaksi = $transaksi;
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.transaksi.show');
    }
}
