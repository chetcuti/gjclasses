<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$ping = new GJClasses\Ping();

$host = 'example.com';
echo $ping->ping($host);
