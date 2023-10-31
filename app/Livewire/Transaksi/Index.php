<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Transaksi;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;
    public $user_id;
    public $kelas_id;
    public $bulan;
    public $sekolah_id;

    public function mount()
    {
        $user = auth()->user();

        if ($user->hasRole(['siswa'])) {
            $this->user_id = auth()->id();
        }

        $this->sekolah_id = auth()->user()->kelas->sekolah->id ?? Sekolah::first()->id;
        $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;

        $this->bulan = date('Y-m');
    }

    public function deleteTransaksi(Transaksi $transaksi)
    {
        $transaksi->delete();
        $this->alert('success', 'Transaksi berhasil dihapus');
    }

    public function render()
    {
        $datas = Transaksi::when($this->user_id, function ($q) {
            return $q->where('user_id', $this->user_id);
        })->when($this->bulan, function ($q) {
            [$tahun, $bulan] = explode('-', $this->bulan);
            return $q->whereYear('created_at', $tahun)->whereMonth('created_at', $bulan);
        })->when($this->kelas_id, function ($q) {
            return $q->where('kelas_id', $this->kelas_id);
        })->latest()->get();

        return view('livewire.transaksi.index', [
            'datas' => $datas,
            'sekolah' => Sekolah::pluck('name', 'id'),
            'kelases' => Kelas::where('sekolah_id', $this->sekolah_id)->pluck('name', 'id'),
        ]);
    }
}
