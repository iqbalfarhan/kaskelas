<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Component;

class Edit extends Component
{
    public Transaksi $transaksi;

    public function render()
    {
        return view('livewire.transaksi.edit');
    }
}
