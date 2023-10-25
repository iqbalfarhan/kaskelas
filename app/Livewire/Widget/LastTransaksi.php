<?php

namespace App\Livewire\Widget;

use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;

class LastTransaksi extends Component
{
    public $kelas_id;
    public $bulan;

    #[On('reloadWidget')]
    public function reloadWidget($data)
    {
        [$kelas_id, $bulan] = $data;

        $this->bulan = $bulan;
        $this->kelas_id = $kelas_id;

    }

    public function mount(){
        $this->bulan = date('Y-m');
    }

    public function render()
    {
        return view('livewire.widget.last-transaksi', [
            'datas' => Transaksi::where('kelas_id', $this->kelas_id)->where('bulan', $this->bulan)->latest()->get()
        ]);
    }
}
