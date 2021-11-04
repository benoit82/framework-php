<?php

namespace SimpleFramework;

use SplObjectStorage;

// recupère les listes des routes valide
class Router
{
    private SplObjectStorage $routes;

    public function addRoute(Route $route)
    {
        $this->routes->attach($route);
    }

    public function getRoute(string $url): Route | null
    {
        foreach ($this->routes as $route) {
            if ($route->getUrl() === $url) return $route;
        }
        return null;
    }
}
