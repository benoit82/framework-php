<?php

use SimpleFramework\App;
use SimpleFramework\Blog;
use SimpleFramework\Container;
use SimpleFramework\Router;
use SimpleFramework\Route;

require_once __DIR__ . '/vendor/autoload.php';




// var_dump($_SERVER["REQUEST_URI"]);

$container = new Container;

$router = new Router;

$router->addRoute(new Route(url: '/', controllerName: 'HomeController', action: 'index'));

$container['router'] = $router;

$container['blog.info'] = 'my simple framework';
$container['blog'] = function ($c) {

    return new Blog($c['blog.info']);
};

App::set($container);

// function dispatch()
// {

//     $container = App::get();
//     $instance = new UserApp\HomeController($container);
//     $method = 'index';

//     return call_user_func_array([$instance, $method], []);
// }
// use Dotenv\Dotenv;

// $dotenv = new Dotenv(__DIR__);
// $dotenv->load();
