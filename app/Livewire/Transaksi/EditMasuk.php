<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Transaksi;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditMasuk extends Component
{
    use LivewireAlert;

    public Transaksi $transaksi;

    public $kelas_id;
    public $bulan;
    public $user_id;
    public $tipe = 'masuk';
    public $kategori = 'rutin';
    public $nominal;
    public $keterangan;


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

        if (Transaksi::find($this->transaksi->id)->update($valid)) {
            $this->flash('success', 'Pemasukan berhasil disimpan');
            return redirect()->route('transaksi.index');
        } else {
            return $this->alert('error', 'Pemasukan gagal disimpan');
        }
    }

    public function mount()
    {
        $data = $this->transaksi;
        $this->bulan = $data->bulan;
        $this->kelas_id = $data->kelas_id;
        $this->tipe = $data->tipe;
        $this->kategori = $data->kategori;
        $this->user_id = $data->user_id;
        $this->nominal = $data->nominal;
        $this->keterangan = $data->keterangan;
    }

    public function render()
    {
        $users = User::when($this->kelas_id, function ($q) {
            $q->where('kelas_id', $this->kelas_id);
        })->pluck('name', 'id');

        return view('livewire.transaksi.edit-masuk', [
            'users' => $users,
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
