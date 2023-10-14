<?php

namespace app\app\Services\ProductSize;

class ProductSizeService
{
    public function getSize($size = null)
    {
        if (is_array($size)) {
            return implode('x', $size);
        }

        return $size;
    }
}
