<?php

namespace SimpleFramework;

// recupère l'URL indiqué par l'utilisateur, coupe 
class Request
{
    private string $requestUri;

    public function __construct()
    {
        $this->requestUri = $_SERVER["REQUEST_URI"];
    }

    public function getRequest(): array
    {
        return explode('/', substr($this->requestUri, 1)); // ex : '/home/id' => ['home','id']
    }


}
