<?php

namespace App\Livewire\Transaksi;

use App\Models\Kelas;
use App\Models\Sekolah;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Keluar extends Component
{
    use LivewireAlert, WithFileUploads;

    public $kelas_id;
    public $tipe = 'keluar';
    public $kategori;
    public $bulan;
    public $nominal;
    public $keterangan;
    public $photo;
    public $sekolah_id;


    public function simpan()
    {
        $valid = $this->validate([
            'kelas_id' => 'required',
            'tipe' => 'required',
            'kategori' => 'required',
            'nominal' => 'required',
            'bulan' => 'required',
            'keterangan' => 'required',
            'photo' => 'required|image',
        ]);

        if ($new = Transaksi::create($valid)) {
            if ($this->photo) {
                $gambar = $this->photo->hashName('pengeluaran_' . $this->kelas_id);
                $makeimage = Image::make($this->photo)->fit(700)->encode('jpg', 80);
                if (Storage::put($gambar, $makeimage)) {
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
        return view('livewire.transaksi.keluar', [
            'sekolah' => Sekolah::pluck('name', 'id'),
            'kelases' => $this->sekolah_id ? Kelas::where('sekolah_id', $this->sekolah_id)->pluck('name', 'id') : [],
        ]);
    }
}
