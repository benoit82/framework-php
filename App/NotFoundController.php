<?php

namespace UserApp;

use SimpleFramework\Controller;

class NotFoundController extends Controller {

    public function index()
    {
        return $this->container['twig']->render('notFound.html.twig');
    }
}