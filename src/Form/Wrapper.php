<?php

namespace SimpleFramework\Form;

use Exception;

class Wrapper extends HtmlContainerElement
{

    public function __construct()
    {
        parent::__construct();
    }

    public function operation(): string
    {
        if ($this->storage->count() === 0) throw new Exception("Empty Wrapper");

        $elements = parent::operation();

        return "<div class=\"wrapper-content\">$elements</div>";
    }
}
