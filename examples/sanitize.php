<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$sanitize = new GJClasses\Sanitize();

$text = 'This is the <strong>text</strong> to be sanitized.';
echo $sanitize->text($text);
