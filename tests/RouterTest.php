<?php

use PHPUnit\Framework\TestCase;
use SimpleFramework\{Router, Route};

class RouterTest extends TestCase
{
    private Router $router;

    public function setUp(): void
    {
        $this->router = new Router;
    }

    /*
     * @test testGetValidRoute test if we get the right route
     */
    public function testGetValidRoute()
    {
        $route = new Route('/about', 'AboutController');
        $this->assertNull($this->router->getRoute('/about'));
        
        $this->router->addRoute($route);
        $this->assertNotNull($this->router->getRoute('/about'));
        $this->assertEquals($this->router->getRoute('/about'), $route);
    }
}
