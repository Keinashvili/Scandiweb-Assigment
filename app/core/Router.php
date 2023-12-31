<?php

namespace app\app\core;

use app\helpers\Helpers;

class Router
{
    public static array $routes = [];

    public function get($action, $callback): void
    {
        $action = trim($action, '/');
        $action = preg_replace('/{[^}]+}/', '(.+)', $action);

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET') {
            self::$routes[$action] = $callback;
        }
    }

    public function post($action, $callback): void
    {
        $action = trim($action, '/');
        $action = preg_replace('/{[^}]+}/', '(.+)', $action);

        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {
            self::$routes[$action] = $callback;
        }
    }

    public function run($action): void
    {
        $action = trim($action, '/');

        $callback = null;
        $params = [];

        foreach (self::$routes as $route => $handler) {
            if (preg_match("%^{$route}$%", $action, $matches) === 1) {
                $callback = $handler;

                unset($matches[0]);

                $params = $matches;

                break;
            }
        }

        if (!$callback || !is_callable($callback)) {
            $message = "<b style='font-style: italic; color: black;'> $_SERVER[REQUEST_URI] </b>";

            Helpers::renderErrorView(404, 'errors/_404_.php', compact('message'));

            exit();
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        call_user_func($callback, ...$params);
    }
}
