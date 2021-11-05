<?php

namespace SimpleFramework\Form\HTMLElements;

class Input implements HtmlElementInterface
{

    public function __construct(
        private string $name,
        private string $type,
        private string $value = ''
    ) {
    }

    public function __toString(): string
    {
        $inputRender = '<input type="' . $this->type . '" name="' . $this->name . '"';
        if ($this->value !== '') $inputRender .= ' value="' . $this->value . '"';
        return $inputRender . ' />';
    }
}
