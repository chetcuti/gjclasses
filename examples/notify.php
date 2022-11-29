<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

// 0 = mail() send via PHP, 1 = SMTP Send via PHPMailer (1 is strongly preferred and encouraged!)
define('GJC_USE_SMTP', 1);

// If GJC_USE_SMTP is set to 1, you'll also need the following settings for the MailSmtp class
define('GJC_EMAIL_ENCODING_TYPE', 'UTF-8');
define('GJC_SMTP_MAIL_SERVER', 'mail.example.com');
define('GJC_SMTP_AUTHENTICATION_ON', true);
define('GJC_SMTP_USERNAME', 'mail@example.com');
define('GJC_SMTP_PASSWORD', '@cc0untp@55w0rd');
define('GJC_SMTP_PROTOCOL', 'tls');
define('GJC_SMTP_PORT', 587);

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// General/Common Settings
$method = 'all'; // all, email, push

// Email Settings
$from_name = "From Name";
$from_address = "from@example.com";
$reply_name = "Reply Name";
$reply_address = "reply@example.com";
$recipients = array('address1@example.com', 'address2@example.com');
$email_subject = 'Email Subject';
$message_html = 'This is the HTML message.';
$message_text = 'This is the TEXT message.';

// Push Settings
$push_provider = 'telegram'; // join, personalapi, pushbullet, pushover, or telegram
$api_key = 'xxxxxxxxxxxxxxxxxxxx'; // API Key -- All Push Providers
$user_key = 'xxxxxxxxxxxxxxxxxxxx'; // User Key (Pushover) or Chat ID (Telegram)
$subject = 'Notify Subject'; // Subject -- All Push Providers -- Leave blank for no Subject
$content = 'This is the push content.'; // Content -- All Push Providers -- Ignored when sending URL (except w/Telegram)
$url = 'https://example.com'; // URL -- All Push Providers -- Leave blank to send Note
$url_text = 'URL Text'; // URL Text -- Telegram -- Leave blank to use URL
$priority = ''; // Priority -- Pushover -- Normal 0 or blank, High 1

new \GJClasses\Notify($method, $from_name, $from_address, $reply_name, $reply_address, $recipients, $email_subject,
    $message_html, $message_text, $push_provider, $api_key, $user_key, $subject, $content, $url, $url_text, $priority);
