<?php

namespace App\Console\Commands;

use App\Helpers\KasKelasHelper;
use App\Models\Kelas;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Console\Command;
use Iqbalfarhan08\Telegramtools\Traits\TelegramTrait;

class ReminderKasCommand extends Command
{
    use TelegramTrait;

    protected $signature = 'bot:reminder {kelas_id}';
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $kelas = Kelas::find($this->argument('kelas_id'));

        if ($kelas->telegram_group_id) {
            $users = $kelas->belumBayar()->toArray() ?? ["tidak ada"];

            $message = implode("\n", [
                "***Saldo kas kelas " . $kelas->name . ":***",
                "Rp " . KasKelasHelper::money($kelas->saldo),
                "\n***Belum bayar kas bulan ini:***",
                implode("\n", $users)
            ]);

            $this->setChatId($kelas->telegram_group_id);
            $this->setParseMode("markdown");
            $this->sendMessage($message);
            $this->info("send to telegram group");
        } else {
            $this->error("Telegram group Not found");
        }

    }
}
