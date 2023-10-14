<?php

namespace app\app\core;

use app\helpers\Helpers;

class Request
{
    public function validateData()
    {
        $validated = $this->rules();

        $rules = new Rules();

        foreach ($validated as $key => $values) {
            foreach ($values as $value) {
                if (!is_array($value)) {
                    $rules->{$value}($key, $this->{$key});
                }

                if (is_array($value)) {
                    foreach ($value as $index => $item) {
                        $rules->{$index}($key, $this->{$key}, $item);
                    }
                }
            }

        }

        if (!empty($rules->errors)) {
            Helpers::back();
        }
    }
}