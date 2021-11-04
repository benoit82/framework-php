<?php

use SimpleFramework\Blog;
use SimpleFramework\Container;

require_once __DIR__ . '/vendor/autoload.php';

function dispatch() {
    $container = new Container;

    $container['blog.info'] = 'my simple framework';
    $container['blog'] = function ($c) {

        return new Blog($c['blog.info']);
    };
    
    $instance = new App\HomeController($container);
    $method = 'index';
    
    return call_user_func_array([$instance, $method], []);
}
// use Dotenv\Dotenv;

// $dotenv = new Dotenv(__DIR__);
// $dotenv->load();

// $dispatcher = new Dispatcher(new Request); // $_GET / $_SERVER["REQUEST_URI"] pour récupérer la demande du client 

