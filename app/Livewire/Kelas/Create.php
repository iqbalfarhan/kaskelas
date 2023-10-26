<?php

namespace App\Livewire\Kelas;

use App\Models\Kelas;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{

    use LivewireAlert;

    public $show;
    public $name;
    public $angkatan;
    public $walikelas = "...";
    public $telegram_group_id;

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'angkatan' => '',
            'walikelas' => '',
            'telegram_group_id' => '',
        ]);

        if (Kelas::create($valid)) {
            $this->flash('success', 'Berhasil menambahkan keterangan kelas');
            return redirect()->route('kelas.index');
        } else {
            $this->alert('error', 'Gagal update keterangan kelas');
        }

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.kelas.create');
    }
}
