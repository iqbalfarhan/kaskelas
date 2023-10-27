<?php

namespace App\Livewire\Pengaturan;

use Iqbalfarhan08\Telegramtools\Traits\TelegramTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Telegram extends Component
{
    use TelegramTrait, LivewireAlert;

    public function resetbottelegram()
    {
        $this->setWebhook();
        $this->alert('success', 'Bot telegram berhasil di reset');
    }

    public function render()
    {
        return view('livewire.pengaturan.telegram');
    }
}
