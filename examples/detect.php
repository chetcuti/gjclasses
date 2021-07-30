<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$browser = new GJClasses\Detect();

// Returns chrome, chromium, firefox, opera, safari, seamonkey
echo $browser->getBrowser();
