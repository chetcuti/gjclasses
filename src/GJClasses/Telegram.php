<?php

namespace GJClasses;

use Telegram\Bot\Api;

class Telegram
{
    public function push($api_key, $chat_id, $content)
    {
        $push = new \GJClasses\Push('telegram');
        $message = $this->pushNote($api_key, $chat_id, $content);

        return $message;
    }

    public function pushNote($api_key, $chat_id, $content)
    {
        $telegram = new Api($api_key);

        $telegram->sendMessage([
            "chat_id" => $chat_id,
            "text" => $content
        ]);

        return 'Note Sent';
    }

}
