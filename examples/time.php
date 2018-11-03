<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$time = new GJClasses\Time();

echo $time->stamp(); // Y-m-d H:i:s

echo $time->timeLong(); // l, F jS

echo $time->timeBasic(); // Y-m-d

echo $time->timeBasicPlusDays(3); // Y-m-d + 3 days

echo $time->timeBasicPlusYears(2); // Y-m-d + 2 years
