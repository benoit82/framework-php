<?php

namespace UserApp;

use SimpleFramework\Controller;

class HomeController extends Controller
{

    public function index()
    {
        return $this->container['twig']->render('home.html.twig', [
            'name' => 'John Doe',
        ]);
    }
}
