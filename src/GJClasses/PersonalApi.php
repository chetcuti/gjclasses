<?php

namespace GJClasses;

class PersonalApi
{
    public function push($subject, $content, $url)
    {
        $push = new \GJClasses\Push('personalapi');
        $message = $this->pushNote($subject, $content, $url);

        return $message;

    }

    public function pushNote($subject, $content, $url)
    {
        $full_url = 'https://api.greg.cloud/telegram';
        $payload = '{"title": "' . $subject . '", "message": "' . $content . '", "url": "' . $url . '"}';

        $handle = curl_init($full_url);
        curl_setopt($handle, CURLOPT_ENCODING, '');
        curl_setopt($handle, CURLOPT_MAXREDIRS, 10);
        curl_setopt($handle, CURLOPT_TIMEOUT, 30);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($handle, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'));
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($handle);
        curl_close($handle);

        return 'URL Sent';
    }

}
