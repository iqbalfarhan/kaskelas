<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditKeluar extends Component
{
    use LivewireAlert, WithFileUploads;

    public Transaksi $transaksi;

    public $kelas_id;
    public $tipe = 'keluar';
    public $kategori;
    public $bulan;
    public $nominal;
    public $keterangan;
    public $photo;


    public function simpan()
    {
        $valid = $this->validate([
            'kelas_id' => 'required',
            'tipe' => 'required',
            'kategori' => 'required',
            'nominal' => 'required',
            'bulan' => 'required',
            'keterangan' => 'required',
        ]);

        if (Transaksi::find($this->transaksi->id)->update($valid)) {
            $new = Transaksi::find($this->transaksi->id);
            if ($this->photo) {
                $this->validate([
                    'photo' => 'image'
                ]);

                $gambar = $this->photo->hashName('pengeluaran_' . $this->kelas_id);
                $makeimage = Image::make($this->photo)->fit(700)->encode('jpg', 80);
                if (Storage::put($gambar, $makeimage)) {
                    // if (Storage::exists($this->transaksi->photo)) {
                    //     Storage::delete($this->transaksi->photo);
                    // }
                    $new->update([
                        'photo' => $gambar
                    ]);
                }
            }
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
        return view('livewire.transaksi.edit-keluar', [
            'kelases' => Kelas::pluck('name', 'id'),
        ]);
    }
}
