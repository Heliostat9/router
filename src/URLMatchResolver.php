<?php

namespace Heliostat\Router;

class URLMatchResolver
{
    private RequestContext $context;
    private Router $router;

    public function __construct(RequestContext $context, Router $router)
    {
        $this->context = $context;
        $this->router = $router;
    }

    public function match()
    {
        //Get method and uri for current query
        $httpMethod = $this->context->method();
        $url = $this->context->uri();

        //Get all register routes
        $routes = $this->router->routes();

        //Get all routes for current http method
        $currentHttpRoutes = $routes[$httpMethod];

        var_dump($currentHttpRoutes);

        foreach ($currentHttpRoutes as $currentRoute)
        {
            $uri = $currentRoute->path;

            $parameters = [];

            $uri_explode = explode('/', ltrim($uri, '/'));

            $url_explode = explode('/', ltrim($url, '/'));

            foreach($uri_explode as $index => $uri_ex) {
                if (preg_match('/{[a-zA-Z1-9]*}/i', $uri_ex)) {
                    if (isset($url_explode[$index])) {
                        $parameters[trim($uri_ex, '{}')] = $url_explode[$index];
                        $uri_explode[$index] = $url_explode[$index];
                    }
                }
            }

            if ('/' . implode('/',$uri_explode) == $url) {
                $action = $currentRoute->action;
                var_dump($parameters);
                return call_user_func($action, ...$parameters);
            }
        }

        return 'not found';
    }
}