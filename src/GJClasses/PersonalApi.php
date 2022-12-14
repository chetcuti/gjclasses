<?php

namespace GJClasses;

class PersonalApi
{
    public function push($api_key, $subject, $content, $url, $priority)
    {
        $push = new \GJClasses\Push('personalapi');
        $message = $this->pushNote($api_key, $subject, $content, $url, $priority);

        return $message;

    }

    public function pushNote($api_key, $subject, $content, $url, $priority)
    {
        $full_url = 'https://api.greg.cloud/notify';
        $payload = '{"api_key": "' . $api_key . '",
                     "title": "' . trim($subject) . '",
                     "message": "' . trim($content) . '",
                     "url": "' . trim($url) . '",
                     "priority": "' . $priority . '"}';

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
