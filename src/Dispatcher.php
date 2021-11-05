<?php

namespace SimpleFramework;

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
        $routes = $this->container['router'];
        $parameters = $this->request->getRequest();
        $route = $routes->getRoute(array_shift($parameters)) ?? new Route('/404', 'NotFoundController');

        $instanceController = $this->makeController($route->getController());
        $this->response = call_user_func_array([$instanceController, $route->getAction()], $parameters ?? []);
        $this->send($route->getControllerName() === 'NotFoundController' ? '404 NOT FOUND' : '200 OK');
    }

    public function send($status)
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
