<?php

namespace SimpleFramework;

class Blog
{
    public function __construct(private string $message)
    {
    }

    public function __toString(): string
    {
        return $this->message;
    }
}
