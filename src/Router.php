<?php

namespace Heliostat\Router;

class Router
{
    private array $routes;

    public function get(Route $route): void
    {
        $this->routes['GET'][] = $route;
    }

    public function post(Route $route): void
    {
        $this->routes['POST'][] = $route;
    }

    public function routes(): array
    {
        return $this->routes;
    }
}