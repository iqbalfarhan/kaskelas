<?php

namespace App\Livewire\Widget;

use App\Models\Transaksi;
use App\Models\User;
use Livewire\Component;

class BelumBayar extends Component
{
    public $bulan;
    public $kelas_id;

    public function render()
    {
        $data = Transaksi::where('bulan', $this->bulan)->where('kelas_id', $this->kelas_id)->pluck('user_id');

        return view('livewire.widget.belum-bayar', [
            'datas' => User::whereNotIn('id', $data)->where('kelas_id', $this->kelas_id)->pluck('name')
        ]);
    }
}
