<?php

use PHPUnit\Framework\TestCase;
use SimpleFramework\Route;

class RouteTest extends TestCase
{
    private Route $route;

    public function setUp(): void
    {
        $this->route = new Route(url: '/', controllerName: 'FakeController', namespaceController: 'App');
    }
    /*
     * @test testGetControllerWithHisNameSpace test if we get the right class of controller
     */
    public function testGetControllerWithHisNameSpace()
    {
        $this->assertEquals($this->route->getController(), 'App\FakeController');

        $routeDefaultNamespace = new Route(url:'/', controllerName: 'AnotherController');
        $this->assertEquals($routeDefaultNamespace->getController(), 'UserApp\AnotherController');
    }
}
