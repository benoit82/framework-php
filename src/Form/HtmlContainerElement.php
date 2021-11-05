<?php

namespace SimpleFramework\Form;

use SplObjectStorage;

abstract class HtmlContainerElement implements HtmlElementInterface {

    protected SplObjectStorage $storage;

    public function __construct()
    {
        $this->storage = new SplObjectStorage;
    }

    public function add(HtmlElementInterface $element): void
    {
        $this->storage->attach($element);
    }

    public function operation(): string
    {
        $output = '';
        foreach ($this->storage as $element) {
            $output .= (string) $element;
        }

        return $output;
    }

    public function __toString(): string
    {
        return $this->operation();
    }
}