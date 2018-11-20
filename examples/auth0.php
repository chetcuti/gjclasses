<?php
require_once __DIR__ . '/../_includes/init.inc.php';
require_once GJC_DIR_INC . '/config.inc.php';

define('GJC_AUTH0_DOMAIN', 'example.auth0.com');
define('GJC_AUTH0_CLIENT_ID', 'xxxxxxxxxx');
define('GJC_AUTH0_CLIENT_SECRET', 'xxxxxxxxxxxxxxxxxxxx');
define('GJC_AUTH0_LOGIN_URL', 'https://example.com/login.php');
define('GJC_AUTH0_CALLBACK_URL', 'https://example.com/loggedin.php');
define('GJC_AUTH0_AUDIENCE', 'https://example.auth0.com/userinfo');
define('GJC_AUTH0_SCOPE', 'openid profile');
define('GJC_AUTH0_PER_ID_TOKEN', true);
define('GJC_AUTH0_PER_ACCESS_TOKEN', true);
define('GJC_AUTH0_PER_REFRESH_TOKEN', true);

require_once GJC_DIR_ROOT . '/vendor/autoload.php';

$auth0 = new \GJClasses\Auth0();

// Display login form
$auth0->login();

// Logout
$auth0->logout();

// Check if logged in, and if so return the user's details
$user_info = $auth0->check();
