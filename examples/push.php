<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$push_provider = 'pushover'; // join, pushbullet, pushover, or telegram
$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key -- All Push Providers
$user_key = 'xxxxxxxxxxxxxxxxxxxxxxxxx'; // User Key -- Pushover, Chat ID -- Telegram
$subject = 'Push Subject'; // Subject -- All Push Providers except Telegram
$content = 'This is the push content.'; // Content -- All Push Providers except Telegram -- Ignored when sending URL (Join)
$url = 'https://en.wikipedia.org/wiki/Push_technology'; // URL -- All Push Providers except Telegram -- Leave blank to send Note
$priority = ''; // Priority -- Pushover -- Normal 0 or blank, High 1

$push = new GJClasses\Push($push_provider);
$message = $push->push($api_key, $user_key, $subject, $content, $url, $priority);

echo $message;
