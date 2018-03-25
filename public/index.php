<?php
if (PHP_SAPI == 'cli-server') {
    $GLOBALS['dev'] = true;
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

$GLOBALS['mysqlLogs'] = [];

$GLOBALS['dir'] = dirname(__FILE__) . '/../';

date_default_timezone_set("America/Vancouver");

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../private/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../private/dependencies.php';

// Register middleware
require __DIR__ . '/../private/middleware.php';

// Register routes
require __DIR__ . '/../private/routes.php';

// Run app
$app->run();
