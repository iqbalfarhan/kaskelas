<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Cekuser extends Component
{
    public $show;

    public function mount()
    {
        $this->show = auth()->user()->active ? false : true;
    }

    public function render()
    {
        return view('livewire.partial.cekuser');
    }
}
