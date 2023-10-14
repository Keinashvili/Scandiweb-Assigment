<?php

namespace app\app\Services\ProductType;

abstract class ProductType
{
    abstract public function getValue(): string;

    abstract public function attribute(): string;
}
