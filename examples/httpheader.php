<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once DIR_INC . '/config.inc.php';

require_once DIR_ROOT . '/vendor/autoload.php';

$http = new GJClasses\HttpHeader();

$domain = 'example.com';

list($domain_status, $domain_data, $final_destination) = $http->process($domain);

echo 'Header Status: ' . $domain_status . '<BR>';
echo 'Header Data: ' . $domain_data . '<BR>';
echo 'Final Destination: ' . $final_destination . '<BR><BR><BR>';
