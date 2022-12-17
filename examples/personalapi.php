<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// PersonalAPI Settings
$api_key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // API Key (Required)
$api_url = 'https://api.example.com/notify'; // API Endpoint (Required)
$title = 'Title'; // Title (Required)
$message = 'This is the message.'; // Message (Required)
$url = 'https://example.com'; // URL -- Optional
$priority = ''; // Empty or 0 = normal priority, 1 = high priority

$api = new GJClasses\PersonalApi($api_key, $api_url);
$result = $api->notify($title, $message, $url, $priority);

echo $result;
