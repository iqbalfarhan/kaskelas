<?php

namespace App\Livewire\Partial;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    public function isActive($routename)
    {
        if (is_array($routename)) {
            return in_array(Request::route()->getName(), $routename) ? 'active' : '';
        }
        return Request::route()->getName() == $routename ? 'active' : '';
    }

    #[On('logout')]
    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function render()
    {
        return view('livewire.partial.sidebar');
    }
}
