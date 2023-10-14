<?php

namespace app\app\Services\ProductType;

class ProductTypeBookService extends ProductType
{
    public function getValue(): string
    {
        return 'KG';
    }

    public function attribute(): string
    {
        return 'Weight:';
    }
}
