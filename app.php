<?php
// DB ou form de connection
use SimpleFramework\{App, Container, Router, Route};
use SimpleFramework\Form\HTMLElements\Input;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container;

$router = new Router;

$router->addRoute(new Route(url: '/', controllerName: 'HomeController'));

$container['router'] = $router;

$container['twig'] = function($c) {
    $loader = new FilesystemLoader(__DIR__ . '/templates');
    $twig = new Environment($loader);

    return $twig;
};

$container['form.signIn'] = function($c) {
    $inputName = new Input(name: 'Name');
}

App::set($container);
