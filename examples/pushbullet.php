<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // Pushbullet API Key
$type = 'url'; // note or url
$subject = 'Push Subject';
$content = 'This is the push content.';
$url = 'https://www.pushbullet.com'; // Only required if $type = url

$push = new GJClasses\Pushbullet();
$message = $push->push($api_key, $type, $subject, $content, $url);

echo $message;
