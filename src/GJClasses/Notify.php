<?php
namespace GJClasses;

class Notify
{
    public function __construct($method, $name, $address, $reply_name, $reply_address, $recipients, $subject, $html,
                                $text, $push_provider, $api_key, $user_key, $content, $url)
    {
        if ($method == 'all') {

            $mail = new Mail();
            $mail->send($name, $address, $reply_name, $reply_address, $recipients, $subject, $html, $text);

            $push = new Push($push_provider);
            $push->push($api_key, $user_key, $subject, $content, $url);

        } elseif ($method == 'email') {

            $mail = new Mail();
            $mail->send($name, $address, $reply_name, $reply_address, $recipients, $subject, $html, $text);

        } elseif ($method == 'push') {

            $push = new Push($push_provider);
            $push->push($api_key, $user_key, $subject, $content, $url);

        }
    }
}
