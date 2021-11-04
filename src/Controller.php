<?php

namespace SimpleFramework;

// permet d'afficher la réponse selon le container ??? 
abstract class Controller
{
    public function __construct(protected Container $container)
    {
    }
}
