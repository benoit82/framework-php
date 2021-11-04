<?php

namespace UserApp;

use SimpleFramework\Controller;

class HomeController extends Controller {

    public function index()
    {
        return (string) $this->container['blog'];
    }
}