<?php

namespace SimpleFramework;

// redirige vers le bon controlleur en écoutant le Request
// regarde les routes valides par la classe Routeur
// et fait appel au bon controlleur
class Dispatcher
{
    private Container $container;
    private string $response = '';

    public function __construct(private Request $request)
    {
        $this->container = App::get();
    }

    public function run()
    {
        // récupère la route à l'aide du router => nom du contrôleur 
        // + méthode avec ses paramètres éventuels
        $routes = $this->container['router'];
        $parameters = $this->request->getRequest();
        $route = $routes->getRoute(array_shift($parameters));
        var_dump($route);


        if($route) {
            $instanceController = $this->makeController($route->getControllerName());
            $this->response = call_user_func_array([$instanceController, $route->getAction()], $parameters ?? []);
            $this->send();
        } else {
            $this->send(status: '404 NOT FOUND');
        }
    }

    public function send($status = '200 OK')
    {
        header("HTTP/1.1 $status");
        header("Content-Type: text/html, charset=UTF-8");

        echo (string) $this;
    }

    protected function makeController($controllerName)
    {
        if (class_exists($controllerName)) {
            return new $controllerName($this->container);
        }
        return null;
    }

    public function __toString(): string
    {
        return $this->response;
    }

}
