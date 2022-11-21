<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// Push Settings
$push_provider = 'telegram'; // join, pushbullet, pushover, or telegram
$api_key = 'xxxxxxxxxxxxxxxxxxxx'; // API Key -- All Push Providers
$user_key = 'xxxxxxxxxxxxxxxxxxxx'; // User Key (Pushover) or Chat ID (Telegram)
$subject = 'Push Subject'; // Subject -- All Push Providers -- Leave blank for no Subject
$content = 'This is the push content.'; // Content -- All Push Providers -- Ignored when sending URL (except w/Telegram)
$url = 'https://example.com'; // URL -- All Push Providers -- Leave blank to send Note
$url_text = 'URL Text'; // URL Text -- Telegram -- Leave blank to use URL
$priority = ''; // Priority -- Pushover -- Normal 0 or blank, High 1

$push = new GJClasses\Push($push_provider);
$message = $push->push($api_key, $user_key, $subject, $content, $url, $url_text, $priority);

echo $message;
