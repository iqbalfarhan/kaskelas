<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Transaksi;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Keluar extends Component
{
    use LivewireAlert;
    public $kelas_id;
    public $tipe = 'keluar';
    public $kategori;
    public $nominal;
    public $keterangan;


    public function simpan()
    {
        $valid = $this->validate([
            'kelas_id' => 'required',
            'tipe' => 'required',
            'kategori' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);

        if (Transaksi::create($valid)) {
            $this->flash('success', 'Pemasukan berhasil disimpan');
            return redirect()->route('transaksi.index');
        } else {
            return $this->alert('error', 'Pemasukan gagal disimpan');
        }
    }

    public function render()
    {
        return view('livewire.transaksi.keluar', [
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
