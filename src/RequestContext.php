<?php

namespace Heliostat\Router;

class RequestContext
{
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}