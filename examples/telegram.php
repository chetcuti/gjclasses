<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key
$chat_id = 'xxxxxxxxxxxxxxxxxxxxxxxxx'; // Chat ID
$content = 'This is the push content.'; // Content

$push = new GJClasses\Telegram();
$message = $push->push($api_key, $chat_id, $content);

echo $message;
