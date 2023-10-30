<?php

namespace App\Livewire\Sekolah;

use App\Models\Sekolah;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use LivewireAlert, WithFileUploads;
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

        Sekolah::create($valid);

        $this->alert('success', 'Sekolah berhasil ditambahkan');

        $this->reset();
        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.sekolah.create');
    }
}
