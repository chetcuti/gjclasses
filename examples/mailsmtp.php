<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

define('EMAIL_ENCODING_TYPE', 'UTF-8');
define('SMTP_MAIL_SERVER', 'mail.example.com');
define('SMTP_FROM_NAME', 'Admin');
define('SMTP_FROM_ADDRESS', 'mail@example.com');
define('SMTP_REPLY_NAME', 'Admin');
define('SMTP_REPLY_ADDRESS', 'mail@example.com');
define('SMTP_AUTHENTICATION_ON', true);
define('SMTP_USERNAME', 'mail@example.com');
define('SMTP_PASSWORD', '@cc0untp@55w0rd');
define('SMTP_PROTOCOL', 'tls');
define('SMTP_PORT', 587);

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$smtp = new GJClasses\MailSmtp();

$recipients = array('address1@example.com', 'address2@example.com');
$subject = "Example Subject";
$message_html = 'This is the HTML message.';
$message_text = 'This is the TEXT message.';

$message = $smtp->send($recipients, $subject, $message_html, $message_text);

echo $message;
