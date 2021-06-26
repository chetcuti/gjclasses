<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// Currency Converter Source
// era  = http://exchangeratesapi.io
// er-a  = https://www.exchangerate-api.com
// erh = https://exchangerate.host -- NO API KEY REQUIRED!
// fixer  = https://fixer.io
// interzoid  = https://interzoid.com
$converter_source = 'erh';

// API Key
$api_key = 'xxxxx';

$currency = new GJClasses\Currency($converter_source, $api_key);

echo $currency->getConvRate('USD', 'CAD');
