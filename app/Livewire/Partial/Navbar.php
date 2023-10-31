<?php

namespace App\Livewire\Partial;

use App\Models\Sekolah;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.partial.navbar', [
            'sekolah' => Session::get('sekolah_id') ? Sekolah::find(Session::get('sekolah_id')) : null,
        ]);
    }
}
