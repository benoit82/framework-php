<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$dispatcher = new Dispatcher(new Request); // $_GET pour récupérer la demande du client 
