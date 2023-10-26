<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $is_command = $req['message']['entities'][0]['type'] == "bot_command" ? true : false;
            $this->setChatId($this->chat_id);
            // $this->message_id = $req['message']['message_id'];
            // return $this->isMessage($req['message']);

            if ($is_command) {
                $this->sendMessage(json_encode($req, JSON_PRETTY_PRINT));
            }

        } elseif (isset($req['callback_query'])) {
            // $this->chat_id = $req['callback_query']['message']['chat']['id'];
            // $this->message_id = $req['callback_query']['message']['message_id'];
            // return $this->isQuery($req['callback_query']);
        } elseif (isset($req['my_chat_member'])) {
            // $this->sendMessage(json_encode($req['my_chat_member'], JSON_PRETTY_PRINT));

            $chat_id = $req['my_chat_member']['chat']['id'];

            if ($req['my_chat_member']['new_chat_member']['status'] != "left") {
                $this->setChatId($chat_id);
                return $this->sendMessage('Telegram ID Group ' . $chat_id);
            }
        }
    }

    public function setWebhook()
    {
        return $this->setWebHook();
    }
}
