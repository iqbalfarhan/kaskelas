<?php

namespace App\Http\Controllers;

use App\Helpers\KasKelasHelper;
use App\Models\Kelas;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Iqbalfarhan08\Telegramtools\Traits\TelegramTrait;

class ApiController extends Controller
{

    use TelegramTrait;
    public $chat_id;

    public function index()
    {
        $kelas = Kelas::first();
        $datas = $kelas->transaksi()->where('bulan', date('Y-m'))->where('tipe', 'keluar')->get();

        $mappedData = $datas->map(function ($data) {
            return $data->keterangan . " " . $data->kelas_id . ", Total pengeluaran : Rp. " . KasKelasHelper::money($data->nominal);
        });

        $mapdata = implode("\n", $mappedData->toArray());

        $pesan = implode("\n", [
            "**Pengeluaran bulan ini**",
            "",
            $mapdata
        ]);

        // $this->sendMessage($pesan);
        return $pesan;
    }

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

            // return $this->sendMessage(json_encode($message, JSON_PRETTY_PRINT));

            if ($is_command) {
                $kelas = Kelas::where('telegram_group_id', $this->chat_id)->first();
                if ($kelas) {
                    if ($text == "/status" || $text == "/status@youth_financial_bot") {
                        Artisan::call('bot:reminder ' . $kelas->id);
                    } elseif ($text == "/saldo" || $text == "/saldo@youth_financial_bot") {
                        $this->sendMessage("Rp. " . KasKelasHelper::money($kelas->saldo));
                    } elseif ($text == "/hai" || $text == "/hai@youth_financial_bot") {
                        $this->sendMessage("Hai juga");
                    } elseif ($text == "/getid" || $text == "/getid@youth_financial_bot") {
                        $this->setParseMode("markdown");
                        $this->sendMessage("telegram ID Group : ```" . $this->chat_id . "```");
                    } elseif ($text == "/belum" || $text == "/belum@youth_financial_bot") {

                        $users = count($kelas->belumBayar()) == 0 ? ["tidak ada"] : $kelas->belumBayar();
                        $pesan = implode("\n", [
                            "***List siswa belum bayar kas bulan ini***",
                            "",
                            implode("\n", $users)
                        ]);

                        $this->setParseMode('markdown');
                        $this->sendMessage($pesan);

                    } elseif ($text == "/sudah" || $text == "/sudah@youth_financial_bot") {
                        $users = count($kelas->sudahBayar()) == 0 ? ["tidak ada"] : $kelas->sudahBayar();
                        $pesan = implode("\n", [
                            "***List siswa sudah bayar kas bulan ini***",
                            "",
                            implode("\n", $users)
                        ]);
                        $this->setParseMode('markdown');
                        $this->sendMessage($pesan);
                    } elseif ($text == "/pengeluaran" || $text == "/pengeluaran@youth_financial_bot") {
                        // $transaksi = $kelas->transaksi->where('bulan', date('Y-m'))->where('tipe', 'keluar')->pluck('keterangan')->toArray();
                        // $pesan = $transaksi ? implode(', ', $transaksi) : ["lorem"];
                        // $this->sendMessage($pesan);

                        $datas = $kelas->transaksi()->where('bulan', date('Y-m'))->where('tipe', 'keluar')->get();
                        $sum = $kelas->transaksi()->where('bulan', date('Y-m'))->where('tipe', 'keluar')->sum('nominal');

                        if ($datas->count() != 0) {
                            $mappedData = $datas->map(function ($data) {
                                return "- " . $data->keterangan . ". (Rp." . KasKelasHelper::money($data->nominal) . ")";
                            });

                            $mapdata = implode("\n", $mappedData->toArray());

                            $pesan = implode("\n", [
                                "***Pengeluaran kas kelas " . $kelas->name . " bulan ini***",
                                "",
                                $mapdata,
                                "",
                                "Total : Rp." . KasKelasHelper::money($sum)
                            ]);

                            $this->setParseMode('markdown');
                            $this->sendMessage($pesan);
                        } else {
                            $this->sendMessage("Belum ada pengeluaran kas untuk kelas " . $kelas->name);
                        }
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
