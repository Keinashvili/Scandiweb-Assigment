<?php

namespace app\app\Services\ProductType;

class ProductTypeFurnitureService extends ProductType
{
    public function getValue(): string
    {
        return 'HxWxL';
    }

    public function attribute(): string
    {
        return 'Dimensions:';
    }
}
