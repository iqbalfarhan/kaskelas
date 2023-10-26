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
            $this->setChatId($this->chat_id);

            $message = $req['message'];
            $is_command = false;

            if (isset($message['entities'][0]['type']) && $message['entities'][0]['type'] == 'bot_command') {
                $is_command = true;
            }

            if ($is_command) {
                return $this->sendMessage(json_encode($req, JSON_PRETTY_PRINT));
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

    public function setWebhook()
    {
        return $this->setWebHook();
    }
}
