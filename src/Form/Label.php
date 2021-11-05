<?php

namespace SimpleFramework\Form;

class Label implements HtmlElementInterface
{

    public function __construct(
        private string $label,
        private Input $element,
    ) {
    }

    public function __toString(): string
    {
        return "<label>{$this->label}" . (string) $this->element . "</label>";
    }
}
