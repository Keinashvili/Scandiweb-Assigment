<?php

namespace app\helpers;

class Helpers
{
    public static function redirect($path)
    {
        header("Location: $path");

        exit();
    }

    public static function back()
    {
        $uri = $_SERVER['REQUEST_URI'];

        header("Location: $uri");

        exit();
    }

    public static function renderErrorView($code, $path, $array = []): bool
    {
        if ($array) {
            foreach ($array as $key => $item) {
                $$key = $item;
            }
        }

        http_response_code($code);

        ob_start();

        require_once __DIR__ . "/../views/$path";

        return ob_flush();
    }

    public static function dd(...$vars)
    {
        foreach ($vars as $var) {
            echo '<pre>';

            var_dump($var);

            echo '<pre>';
        }

        exit();
    }

    public static function error($name)
    {
        if (key_exists("$name", $_SESSION)) {
            echo $_SESSION["$name"];
        }
    }
}
