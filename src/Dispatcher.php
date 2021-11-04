<?php

namespace SimpleFramework;

// redirige vers le bon controlleur en écoutant le Request
// regarde les routes valides par la classe Routeur
// et fait appel au bon controlleur
class Dispatcher
{
    public function __construct(private Request $request)
    {
    }

    public function run()
    {
        // récupère la route à l'aide du router => nom du contrôleur + méthode avec ses paramètres éventuels

        // puis lance la méthode send() pour afficher la réponse.
    }

    protected function makeController($controller)
    {
        // ...
        return new $controllerClass($container);
    }

}
