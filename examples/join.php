<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key
$subject = 'Push Subject'; // Subject
$content = 'This is the push content.'; // Content -- Ignored when sending a URL
$url = 'https://joaoapps.com/join/'; // URL -- Leave blank to send Note

$push = new GJClasses\Join();
$message = $push->push($api_key, $subject, $content, $url);

echo $message;
