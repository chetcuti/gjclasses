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

$from_name = "From Name";
$from_address = "from@example.com";
$reply_name = "Reply Name";
$reply_address = "reply@example.com";
$recipients = array('address1@example.com', 'address2@example.com');
$subject = "Example Subject";
$message_html = 'This is the HTML message.';
$message_text = 'This is the TEXT message.';

$mail = new GJClasses\Mail();
$message = $mail->send($from_name, $from_address, $reply_name, $reply_address, $recipients, $subject, $message_html, $message_text);

echo $message;
