<?php

namespace app\app\Services\ProductType;

class ProductTypeEnum
{
    private const PRODUCT_TYPE_ARRAY = [
        '1' => ProductTypeDVDService::class,
        '2' => ProductTypeFurnitureService::class,
        '3' => ProductTypeBookService::class,
    ];

    private const PRODUCT_TYPE_ATTRIBUTE = [
        'MB' => ProductTypeDVDService::class,
        'HxWxL' => ProductTypeFurnitureService::class,
        'Kg' => ProductTypeBookService::class,
    ];

    public static function getType($key)
    {
        return new (self::PRODUCT_TYPE_ARRAY[$key])();
    }

    public static function getAttribute($key)
    {
        return new (self::PRODUCT_TYPE_ATTRIBUTE[$key])();
    }
}
