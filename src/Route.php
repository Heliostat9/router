<?php

namespace Heliostat\Router;

class Route
{
    public string $path;
    public $action;

    public function __construct(string $path, $action)
    {
        $this->path = $path;
        $this->action = $action;
    }
}