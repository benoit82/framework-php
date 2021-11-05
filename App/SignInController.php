<?php

namespace UserApp;

use SimpleFramework\Controller;

class SignInController extends Controller
{

    public function index()
    {
        return $this->container['twig']->render('signInForm.html.twig', [
            'form' => (string) $this->container['form.signIn'],
        ]);
    }
}
