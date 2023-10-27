<?php

namespace App\Http\Controllers;

use App\Helpers\KasKelasHelper;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Iqbalfarhan08\Telegramtools\Traits\TelegramTrait;

class ApiController extends Controller
{

    use TelegramTrait;
    public $chat_id;

    public function teletester()
    {
        $this->sendMessage("hallo gais");
    }

    public function telegram()
    {
        $req = json_decode(file_get_contents("php://input"), TRUE);

        if (isset($req['message'])) {
            $this->chat_id = $req['message']['chat']['id'];
            $this->setChatId($this->chat_id);

            $message = $req['message'];
            $text = $req['message']['text'];
            $is_command = false;

            if (isset($message['entities'][0]['type']) && $message['entities'][0]['type'] == 'bot_command') {
                $is_command = true;
            }

            if ($is_command) {
                $kelas = Kelas::where('telegram_group_id', $this->chat_id)->first();
                if ($kelas) {
                    if ($text == "/status") {
                        Artisan::call('bot:reminder ' . $kelas->id);
                    } elseif ($text == "/saldo") {
                        $this->sendMessage("Rp. " . KasKelasHelper::money($kelas->saldo));
                    } elseif ($text == "/belum") {
                        $users = count($kelas->belumBayar()) == 0 ? ["tidak ada"] : $kelas->belumBayar();
                        $pesan = implode("\n", $users);
                        $this->sendMessage($pesan);
                    } elseif ($text == "/sudah") {
                        $users = count($kelas->sudahBayar()) == 0 ? ["tidak ada"] : $kelas->sudahBayar();
                        $pesan = implode("\n", $users);
                        $this->sendMessage($pesan);
                    } elseif ($text == "/pengeluaran") {
                        $transaksi = $kelas->transaksi->where('bulan', date('Y-m'))->where('tipe', 'keluar')->pluck('keterangan')->toArray();
                        $pesan = $transaksi ? implode(', ', $transaksi) : ["lorem"];
                        $this->sendMessage($pesan);
                    } else {
                        $this->sendMessage("Command tidak ditemukan");
                    }
                } else {
                    $this->sendMessage("Command bot hanya dapat dilakukan di group kelas");
                }
            }

        } elseif (isset($req['callback_query'])) {
            // $this->chat_id = $req['callback_query']['message']['chat']['id'];
            // $this->message_id = $req['callback_query']['message']['message_id'];
            // return $this->isQuery($req['callback_query']);
        } elseif (isset($req['my_chat_member'])) {
            $chat_id = $req['my_chat_member']['chat']['id'];

            if ($req['my_chat_member']['new_chat_member']['status'] != "left") {
                $this->setChatId($chat_id);
                return $this->sendMessage('Telegram ID Group ' . $chat_id);
            }
        }
    }

    public function updatewebhook()
    {
        return $this->setWebhook();
    }
}
