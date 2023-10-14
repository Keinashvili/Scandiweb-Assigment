<?php

namespace app\app\Services\ProductType;

class ProductTypeDVDService extends ProductType
{
    public function getValue(): string
    {
        return 'MB';
    }

    public function attribute(): string
    {
        return 'Size:';
    }
}
