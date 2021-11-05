<?php

use PHPUnit\Framework\TestCase;
use SimpleFramework\Request;

class RequestTest extends TestCase {

    /*
     * @test testGetParametersFromUri test if we retrieve an array parameters from url
     */
    public function testGetParametersFromUri()
    {
        $_SERVER["REQUEST_URI"] = "/home/id/4";
        $request = new Request;
        $this->assertEquals($request->getRequest(), ['home','id','4']);
    }

    /*
     * @test testHomeUrl test if we provide an empty url for homepage
     */
    public function testHomeUrl()
    {
        $_SERVER["REQUEST_URI"] = "/";
        $request = new Request;
        $this->assertEquals($request->getRequest(), ['/']);
    }
}