<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

use app\app\core\Router;

require_once __DIR__ . '/../routes/web.php';

$action = $_SERVER['REQUEST_URI'];

$router = new Router();

$router->run($action);
