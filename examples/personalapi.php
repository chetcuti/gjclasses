<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// Push Settings
$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key
$subject = 'Subject'; // Subject -- Leave blank for no Subject
$content = 'This is the push content.'; // Content
$url = 'https://example.com'; // URL -- Leave blank to send Note

$push = new GJClasses\PersonalApi();
$message = $push->push($api_key, $subject, $content, $url);

echo $message;
