<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$_SESSION['s_user_id'] = 23;
$log = new GJClasses\Log('/examples/Log.php');

$message = 'This is the log message';
$extra_info = array('Extra' => 'data', 'Goes' => 'here');
$log->warning($message, $extra_info);
