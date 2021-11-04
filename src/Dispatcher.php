<?php

namespace SimpleFramework;

// redirige vers le bon controlleur en écoutant le Request
// regarde les routes valides par la classe Routeur
// et fait appel au bon controlleur
class Dispatcher
{
    private Container $container;

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
        $route = $routes->getRoute(array_shift($parameters) ?? "/");

        if($route) {
            $instanceController = $this->makeController($route->getControllerName());
            $response = call_user_func_array([$instanceController, $route->getAction()], $parameters ?? []);
        }

        // puis lance la méthode send() pour afficher la réponse.
    }

    protected function makeController($controllerName)
    {
        if (class_exists($controllerName)) {
            return new $controllerName($this->container);
        }
        return null;
    }

}
