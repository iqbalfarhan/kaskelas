<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Transaksi;
use Livewire\Component;

class Index extends Component
{
    public $user_id;
    public $kelas_id;
    public $bulan;

    public function mount()
    {
        $user = auth()->user();

        if ($user->hasRole('siswa')) {
            $this->user_id = auth()->id();
        }

        $this->bulan = date('Y-m');
    }

    public function render()
    {
        $datas = Transaksi::when($this->user_id, function($q){
            return $q->where('user_id', $this->user_id);
        })->when($this->bulan, function($q){
            [$tahun, $bulan] = explode('-', $this->bulan);
            return $q->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan);
        })->when($this->kelas_id, function($q){
            return $q->where('kelas_id', $this->kelas_id);
        })->latest()->get();

        return view('livewire.transaksi.index', [
            'datas' => $datas,
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
