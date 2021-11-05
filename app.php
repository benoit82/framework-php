<?php

use SimpleFramework\{App, Blog, Container, Router, Route};

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container;

$router = new Router;

$router->addRoute(new Route(url: '/', controllerName: 'HomeController', action: 'index'));

$container['router'] = $router;

$container['blog.info'] = 'Hello World';
$container['blog'] = function ($c) {

    return new Blog($c['blog.info']);
};

App::set($container);
