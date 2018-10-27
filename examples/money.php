<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$_SESSION['s_user_id'] = 23;
$money = new GJClasses\Money();

echo $money->getConvRate('USD', 'CAD');
