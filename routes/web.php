<?php

use app\app\Controllers\HomeController;
use app\app\core\Router;
use app\requests\ProductRequest;

$router = new Router();

$router->get('/', function () {
    (new HomeController())->index();
});

$router->get('/add_product', function () {
    (new HomeController())->create();
});

$router->post('/add_product', function () {
    (new HomeController())->store(new ProductRequest());
});

$router->post('/remove-product', function () {
    (new HomeController())->destroy((new ProductRequest())->ids);
});
