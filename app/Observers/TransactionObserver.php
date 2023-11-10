<?php

namespace App\Observers;

use App\Helpers\KasKelasHelper;
use App\Models\Transaksi;
use Iqbalfarhan08\Telegramtools\Traits\TelegramTrait;

class TransactionObserver
{

    use TelegramTrait;
    /**
     * Handle the Transaksi "created" event.
     */
    public function created(Transaksi $transaksi): void
    {
        $tipe = $transaksi->tipe == "masuk" ? "pemasukan" : "poengeluaran";
        $chat_id = $transaksi->kelas->telegram_group_id ?? null;
        $message = implode('\n', [
            "**Input ".$tipe." berhasil**\n",
            "keterangan : ".$transaksi->keterangan,
            "nominal : Rp.".KasKelasHelper::money($transaksi->nominal ?? 0),
        ]);

        if ($chat_id) {
            $this->setChatId($chat_id);
        }

        $this->setParseMode('html');
        $this->sendMessage($message);
    }

    /**
     * Handle the Transaksi "updated" event.
     */
    public function updated(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "deleted" event.
     */
    public function deleted(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "restored" event.
     */
    public function restored(Transaksi $transaksi): void
    {
        //
    }

    /**
     * Handle the Transaksi "force deleted" event.
     */
    public function forceDeleted(Transaksi $transaksi): void
    {
        //
    }
}
