<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key
$user_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // User Key
$subject = 'Push Subject'; // Subject
$content = 'This is the push content.'; // Content
$url = 'https://pushover.net'; // URL -- Leave blank to send Note
$priority = ''; // Priority -- Normal 0 or blank, High 1

$push = new GJClasses\Pushover();
$message = $push->push($api_key, $user_key, $subject, $content, $url, $priority);

echo $message;
