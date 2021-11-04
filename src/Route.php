<?php

namespace SimpleFramework;

class Route
{
    public function __construct(
        private string $url,
        private string $controllerName,
        private string $action
    ) {
    }

    /**
     * Get the value of action
     *
     * @return  mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Get the value of url
     *
     * @return  mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the value of controllerName
     *
     * @return  mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }
}
