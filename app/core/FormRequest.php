<?php

namespace app\app\core;

abstract class FormRequest extends Request
{
    abstract public function rules();

    public function __construct()
    {
        $this->loadData();
    }

    private function loadData(): void
    {
        foreach ($_POST as $itemKey => $itemValue) {
            $this->{$itemKey} = $itemValue;
        }
    }
}
