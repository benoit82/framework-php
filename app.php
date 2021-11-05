<?php
// DB ou form de connection
use SimpleFramework\{App, Container, Router, Route};
use SimpleFramework\Form\{Form, Input, Label, Wrapper};
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container;

$router = new Router;

$router->addRoute(new Route(url: '/', controllerName: 'HomeController'));
$router->addRoute(new Route(url: 'signIn', controllerName: 'SignInController'));

$container['router'] = $router;

$container['twig'] = function ($c) {
    $loader = new FilesystemLoader(__DIR__ . '/templates');
    $twig = new Environment($loader);

    return $twig;
};

$container['form.signIn'] = function ($c) {
    $signInForm = new Form(name: 'signInUser', action: '/user');
    $inputName = new Input(name: 'name', type: 'text');
    $labelName = new Label('Nom', $inputName);

    $inputPassword = new Input(name: 'password', type: 'password');
    $labelPassword = new Label('Mot de passe', $inputPassword);

    $infosWrapper = new Wrapper;
    $infosWrapper->add($labelName);
    $infosWrapper->add($labelPassword);

    $inputButton = new Input(name: 'submit', value: 'Envoyer', type: 'submit');

    $submitBtnWrapper = new Wrapper;
    $submitBtnWrapper->add($inputButton);

    $signInForm->add($infosWrapper);
    $signInForm->add($submitBtnWrapper);

    return $signInForm;
};

App::set($container);
