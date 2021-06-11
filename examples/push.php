<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$push_provider = 'xxxxx'; // join, pushbullet, or pushover
$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key -- All Push Providers
$user_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // User Key -- Pushover
$subject = 'Push Subject'; // Subject -- All Push Providers
$content = 'This is the push content.'; // Content -- All Push Providers -- Ignored when sending URL (Join)
$url = 'https://en.wikipedia.org/wiki/Push_technology'; // URL -- All Push Providers -- Leave blank to send Note

$push = new GJClasses\Push($push_provider);
$message = $push->push($api_key, $user_key, $subject, $content, $url);

echo $message;
