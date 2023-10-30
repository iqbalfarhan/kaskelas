<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use App\Models\Sekolah;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Show extends Component
{
    use LivewireAlert;
    public Kelas $kelas;

    public $sekolah_id;
    public $kelas_id;
    public $name;
    public $angkatan;
    public $walikelas;
    public $telegram_group_id;

    public function mount(Kelas $kelas)
    {
        $this->kelas = $kelas;

        $this->kelas_id = $kelas->id;
        $this->name = $kelas->name;
        $this->angkatan = $kelas->angkatan;
        $this->walikelas = $kelas->walikelas;
        $this->telegram_group_id = $kelas->telegram_group_id;
        $this->sekolah_id = $kelas->sekolah_id;
    }

    public function simpan()
    {
        $valid = $this->validate([
            'name' => '',
            'angkatan' => '',
            'walikelas' => '',
            'telegram_group_id' => '',
            'sekolah_id' => 'required',
        ]);

        if (Kelas::find($this->kelas_id)->update($valid)) {
            $this->flash('success', 'Berhasil update keterangan kelas');
            return redirect()->route('kelas.index');
        } else {
            $this->alert('error', 'Gagal update keterangan kelas');
        }
    }

    public function render()
    {
        return view('livewire.kelas.show', [
            'sekolahs' => Sekolah::pluck('name', 'id'),
        ]);
    }
}
