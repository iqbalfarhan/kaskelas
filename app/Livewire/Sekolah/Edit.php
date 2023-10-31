<?php

namespace App\Livewire\Sekolah;

use App\Models\Sekolah;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use LivewireAlert, WithFileUploads;

    public Sekolah $sekolah;

    public $name;
    public $address;
    public $logo;

    public $show = false;

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'logo' => '',
        ]);

        if ($this->logo) {
            $this->validate([
                'logo' => 'image'
            ]);

            $filename = $this->logo->hashName('sekolah');
            $makeimage = Image::make($this->logo)->fit(500)->encode('jpg', 80);
            if (Storage::put($filename, $makeimage)) {
                $valid['logo'] = $filename;
            }
        }

        $this->sekolah->update($valid);

        $this->alert('success', 'Sekolah berhasil diubah');

        $this->reset();
        $this->dispatch('reload');
    }

    #[On('editSekolah')]
    public function editSekolah(Sekolah $sekolah)
    {
        $this->show = true;
        $this->sekolah = $sekolah;

        $this->name = $sekolah->name;
        $this->address = $sekolah->address;
        $this->logo = $sekolah->logo;
    }

    public function render()
    {
        return view('livewire.sekolah.edit');
    }
}
