<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Transaksi;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Masuk extends Component
{
    use LivewireAlert;
    public $kelas_id;
    public $bulan;
    public $user_id;
    public $tipe = 'masuk';
    public $kategori = 'rutin';
    public $nominal;
    public $keterangan;
    public $sekolah_id;


    public function simpan()
    {
        $valid = $this->validate([
            'kelas_id' => 'required',
            'user_id' => 'required',
            'tipe' => 'required',
            'kategori' => 'required',
            'nominal' => 'required',
            'bulan' => 'required',
            'keterangan' => 'required',
        ]);

        if (Transaksi::create($valid)) {
            $this->flash('success', 'Pemasukan berhasil disimpan');
            return redirect()->route('transaksi.index');
        } else {
            return $this->alert('error', 'Pemasukan gagal disimpan');
        }
    }

    public function updatedSekolahId($sekolah_id)
    {
        if ($sekolah_id) {
            $this->kelas_id = Sekolah::find($sekolah_id)->kelases->first()->id;
        } else {
            $this->kelas_id = null;
        }
    }

    public function mount()
    {
        $this->bulan = date('Y-m');
        $this->sekolah_id = auth()->user()->kelas->sekolah->id ?? Sekolah::first()->id;
        $this->kelas_id = auth()->user()->kelas_id ?? Kelas::first()->id;
    }

    public function render()
    {
        $users = User::when($this->kelas_id, function ($q) {
            $q->where('kelas_id', $this->kelas_id);
        })->pluck('name', 'id');

        return view('livewire.transaksi.masuk', [
            'users' => $users,
            'sekolah' => Sekolah::pluck('name', 'id'),
            'kelases' => $this->sekolah_id ? Kelas::where('sekolah_id', $this->sekolah_id)->pluck('name', 'id') : [],
        ]);
    }
}
