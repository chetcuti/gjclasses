<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// Currency Converter Source
// fcca = Free Currency Converter API (https://free.currencyconverterapi.com)
// era  = Exchange Rates API (http://exchangeratesapi.io)
$money = new GJClasses\Money('fcca');

echo $money->getConvRate('CAD', 'USD');
