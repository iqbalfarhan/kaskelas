<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iqbalfarhan08\Telegramtools\Traits\TelegramTrait;

class ApiController extends Controller
{

    use TelegramTrait;
    public function teletester()
    {
        $this->sendMessage("hallo gais");
        // return config('telegramtools.link');
    }

    public function telegram()
    {
        $req = json_decode(file_get_contents("php://input"), TRUE);

        $chat_id = $req['message']['chat']['id'];

        $this->setChatId($chat_id);
        return $this->sendMessage("silakan ini dia Telegram ID kamu <b>{$chat_id}</b>");
    }

    public function setWebhook()
    {
        return $this->setWebHook();
    }
}
