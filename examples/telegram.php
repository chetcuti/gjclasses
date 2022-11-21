<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// Push Settings
$api_key = 'xxxxxxxxxxxxxxxxxxxx'; // API Key
$chat_id = 'xxxxxxxxxxxxxxxxxxxx'; // Chat ID
$subject = 'Subject'; // Subject -- Leave blank for no Subject
$content = 'This is the push content.'; // Content
$url = 'https://example.com'; // URL -- Leave blank to send Note
$url_text = 'URL Text'; // URL Text -- Leave blank to use URL

$push = new GJClasses\Telegram();
$message = $push->push($api_key, $chat_id, $subject, $content, $url, $url_text);

echo $message;
