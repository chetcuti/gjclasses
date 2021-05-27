<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

// Currency Converter Source
// era  = Exchange Rates API (http://exchangeratesapi.io)
// er-a  = ExchangeRate-API (https://www.exchangerate-api.com)
// fixer  = Fixer.io (https://fixer.io)
$converter_source = 'era';

// API Key
$api_key = 'xxxxx';

$currency = new GJClasses\Currency($converter_source, $api_key);

echo $currency->getConvRate('USD', 'CAD');
