<?php

namespace UserApp;

use SimpleFramework\Controller;
use SimpleFramework\Form\HTMLElements\Form;

class SignInController extends Controller
{
    private Form $form;

    public function __construct()
    {
        $this->form = new Form(name:'signInUser', action: '/user');
        $this->buildForm();
    }

    public function buildForm()
    {
        
    }

    public function index()
    {
        return $this->container['twig']->render('signInForm.html.twig', [
            'form' => (string) $this->form,
        ]);
    }
}
