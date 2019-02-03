<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$unsanitize = new GJClasses\Unsanitize();

$text = 'This is the &lt;strong&gt;text&lt;/strong&gt; to be unsanitized.';
echo $unsanitize->text($text);
