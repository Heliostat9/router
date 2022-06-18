<?php

namespace Heliostat\Router;

class Router
{
    private array $routes;

    public function get(Route $route): void
    {
        $this->routes['GET'][] = $route;
    }

    public function routes(): array
    {
        return $this->routes;
    }
}