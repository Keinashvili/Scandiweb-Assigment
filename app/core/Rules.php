<?php

namespace app\app\core;

use app\app\Database\Database;

class Rules
{
    public array $errors = [];

    public function unique($key, $requestKey, $table)
    {
        $model = new Model();
        $tables = (new Database())->showTables();

        foreach ($tables as $newTableName) {
            if (in_array($table, $newTableName)) {
                $columns = $model->column($key, $newTableName[0]);
                foreach ($columns as $column) {
                    if (in_array($requestKey, $column)) {
                        $this->errors[$key] = $key;
                        $_SESSION[$key] = $key . ' already exists!';
                    }
                }
            }
        }
    }

    public function required($key, $requestKey)
    {
        if (is_array($requestKey)) {
            foreach ($requestKey as $newValue) {
                if (empty($newValue)) {
                    $this->errors[$key] = $key;
                    $_SESSION[$key] = $key . ' is required!';
                }
            }
        }

        if ($requestKey === '') {
            $this->errors[$key] = $key;
            $_SESSION[$key] = $key . ' is required!';
        }
    }

    public function selected($key, $requestKey)
    {
        if (strlen($requestKey == 0)) {
            $this->errors[$key] = $key;
            $_SESSION[$key] = 'Please select an item!';
        }
    }

    public function numeric($key, $requestKey)
    {
        if (is_array($requestKey)) {
            foreach ($requestKey as $newValue) {
                if (!is_numeric($newValue)) {
                    $this->errors[$key] = $key;
                    $_SESSION[$key] = $key . "'s must be numeric!";
                }
            }
        } elseif (!is_numeric($requestKey)) {
            $this->errors[$key] = $key;
            $_SESSION[$key] = $key . ' must be numeric!';
        }
    }
}