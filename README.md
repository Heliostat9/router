# Simple router library

# Example usage
```php
<?php

require "vendor/autoload.php";

$context = new \Heliostat\Router\RequestContext();

$router = new Heliostat\Router\Router();

$route = new \Heliostat\Router\Route("user/{id}/photo/{photo}", function($id, $photo) {
   return "Hello, user $id, your id photo: $photo";
});

$router->get($route);

echo (new \Heliostat\Router\URLMatchResolver($context, $router))->match();
```
