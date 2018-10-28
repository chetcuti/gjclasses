<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$push_provider = 'pushbullet';
$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // Push Provider API Key
$type = 'url'; // note or url
$subject = 'Push Subject';
$content = 'This is the push content.';
$url = 'https://en.wikipedia.org/wiki/Push_technology'; // Only required if $type = url

$push = new GJClasses\Push($push_provider);
$message = $push->push($api_key, $type, $subject, $content, $url);

echo $message;
