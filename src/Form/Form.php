<?php

namespace SimpleFramework\Form\HTMLElements;

use Exception;

class Form extends HtmlContainerElement
{
    public function __construct(
        private string $name,
        private string $action,
        private string $method = 'get'
    ) {
        parent::__construct();
    }

    public function operation(): string
    {
        if ($this->storage->count() === 0) throw new Exception("Empty Form");

        $elements = parent::operation();

        return "<form name=\"{$this->name}\" action=\"{$this->action}\" method=\"{$this->method}\">$elements</form>";
    }
}
