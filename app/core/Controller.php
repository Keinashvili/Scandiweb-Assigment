<?php

namespace app\app\core;

class Controller
{
    protected function view($path, $array = []): bool
    {
        if ($array) {
            foreach ($array as $key => $item) {
                $$key = $item;
            }
        }
        ob_start();
        require_once __DIR__ . "/../../views/$path";
        return ob_flush();
    }
}
