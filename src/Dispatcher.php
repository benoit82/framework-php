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
        $route = $routes->getRoute($this->request->getRequest());

        if($route) {
            $instanceController = $this->makeController($route->getControllerName());
            // TODO : add parameters from $route->getParameters() (renvoi un tableau de parametres)
            call_user_func_array([$instanceController, $route->getAction()], []);
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
