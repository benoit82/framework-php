<?php

/**
 * @author: 
 * @description: framework PHP
 */

use SimpleFramework\Dispatcher;
use SimpleFramework\Request;

require_once __DIR__ . '/../app.php';

$dispatcher = new Dispatcher(new Request);
$dispatcher->run();