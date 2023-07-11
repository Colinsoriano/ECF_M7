<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Test\Models' => APP_PATH . '/common/models/',
    'Test'        => APP_PATH . '/common/library/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Test\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Test\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
