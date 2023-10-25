<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public $user_id;

    public function mount()
    {
        $this->user_id = auth()->id();
    }

    public function render()
    {
        $datas = Transaksi::where('user_id', $this->user_id)->latest()->get();

        return view('livewire.transaksi.index', [
            'datas' => $datas,
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
