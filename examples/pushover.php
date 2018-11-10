<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key
$user_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // User Key
$subject = 'Push Subject'; // Subject
$content = 'This is the push content.'; // Content
$url = 'https://pushover.net'; // URL -- Leave blank to send Note

$push = new GJClasses\Pushover();
$message = $push->push($api_key, $user_key, $subject, $content, $url);

echo $message;
