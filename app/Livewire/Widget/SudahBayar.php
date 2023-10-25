<?php

namespace App\Livewire\Widget;

use App\Models\Transaksi;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class SudahBayar extends Component
{
    public $bulan;
    public $kelas_id;

    #[On('reloadWidget')]
    public function reloadWidget($data)
    {
        [$kelas_id, $bulan] = $data;

        $this->bulan = $bulan;
        $this->kelas_id = $kelas_id;

    }

    public function render()
    {
        $data = Transaksi::where('bulan', $this->bulan)->where('kelas_id', $this->kelas_id)->pluck('user_id');

        return view('livewire.widget.sudah-bayar', [
            'datas' => User::whereIn('id', $data)->where('kelas_id', $this->kelas_id)->pluck('name')
        ]);
    }
}
