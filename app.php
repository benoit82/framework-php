<?php

require_once __DIR__ . '/vendor/autoload.php';

// use Dotenv\Dotenv;

// $dotenv = new Dotenv(__DIR__);
// $dotenv->load();

// $dispatcher = new Dispatcher(new Request); // $_GET / $_SERVER["REQUEST_URI"] pour récupérer la demande du client 

var_dump($_SERVER["REQUEST_URI"]);

$route = $_SERVER["REQUEST_URI"];

var_dump($route);

function HomeController()
{
    header("HTTP/1.1 200");
    header("Content-Type: text/html, charset=UTF-8");

    echo "Home page";
}

function NotFoundController()
{
    header("HTTP/1.1 404");
    header("Content-Type: text/html, charset=UTF-8");

    echo "Not Found";
}

// Router 
if ($route == "/app") {

    HomeController();
} else {

    NotFoundController();
}
