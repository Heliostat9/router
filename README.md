# Simple router library

# Example usage
```php
<?php

require "vendor/autoload.php";

$context = new \Heliostat\Router\RequestContext();

$router = new Heliostat\Router\Router();

$router->get(new \Heliostat\Router\Route("/", function () {
    return "
    <form method='post' action='user'>
        <input type='submit'>
    </form>
    ";
}));

$route = new \Heliostat\Router\Route("user/{id}/photo/{photo}", function($id, $photo) {
   return "Hello, user $id, your id photo: $photo";
});

$router->get(new \Heliostat\Router\Route("user/{id}", function ($id) {
    return "User id: $id";
}));

$router->get($route);

$router->post(new \Heliostat\Router\Route("user", function () {
    return 'user POST';
}));

echo (new \Heliostat\Router\URLMatchResolver($context, $router))->match();
```
