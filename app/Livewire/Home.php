<?php

namespace App\Livewire;

use App\Models\Kelas;
use App\Models\Sekolah;
use Livewire\Component;

class Home extends Component
{
    public $kelas_id;
    public $sekolah_id;
    public $bulan;

    public function updatedSekolahId($sekolah_id)
    {
        $this->kelas_id = Sekolah::find($sekolah_id)->kelases->first()->id;
        $this->sendEmit();
    }

    public function updatedKelasId()
    {
        $this->sendEmit();
    }

    public function updatedBulan()
    {
        $this->sendEmit();
    }

    public function sendEmit()
    {
        $this->dispatch('reloadWidget', [
            $this->kelas_id,
            $this->bulan
        ]);
    }

    public function mount()
    {
        $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;
        $this->sekolah_id = auth()->user()->kelas->sekolah->id ?? Sekolah::first()->id;
        $this->bulan = now()->format('Y-m');
    }

    public function render()
    {
        return view('livewire.home', [
            'kelas' => Kelas::find($this->kelas_id),
            'sekolah' => Sekolah::whereHas('kelases')->pluck('name', 'id'),
            'kelases' => Kelas::where('sekolah_id', $this->sekolah_id)->pluck('name', 'id'),
            'sekolah_name' => Sekolah::find($this->sekolah_id)->name ?? "Pilih sekolah",
            'kelas_name' => Kelas::find($this->kelas_id)->name ?? "Pilih kelas",
        ]);
    }
}
