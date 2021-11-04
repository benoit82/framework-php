<?php

use PHPUnit\Framework\TestCase;
use SimpleFramework\Request;

class RequestTest extends TestCase {

    private Request $request;

    public function setup(): void
    {
        $_SERVER["REQUEST_URI"] = "/home/id/4";
        $this->request = new Request;
    }

    /*
     * @test testGetParametersFromUri test if we retrieve an array parameters from url
     */
    public function testGetParametersFromUri()
    {
        $this->assertEquals($this->request->getRequest(), ['home','id','4']);
    }
}