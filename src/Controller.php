<?php

namespace SimpleFramework;

abstract class Controller
{
    public function __construct(protected Container $container)
    {
    }
}
