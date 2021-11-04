<?php

namespace SimpleFramework;
 
class Request
{
    private string $requestUri;

    public function __construct()
    {
        $this->requestUri = $_SERVER["REQUEST_URI"];
    }

    public function getRequest(): array
    {
        return explode('/', substr($this->requestUri, 1));
    }

}
