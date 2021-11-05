<?php

namespace SimpleFramework\Form\HTMLElements;

class Input implements HtmlElementInterface {

    public function __construct(
        private string $name,
        private string $value,
        private string $type
    )
    {
    }

    public function __toString(): string
    {
        return "<input type=\"{$this->type}\" name=\"{$this->name}\" value=\"{$this->value}\" />";
    }
}