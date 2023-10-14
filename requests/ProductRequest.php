<?php

namespace app\requests;

use app\app\core\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sku' => ['required',
                [
                    'unique' => 'products'
                ]
            ],
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'type' => ['required', 'selected'],
            'size' => ['required', 'numeric'],
        ];
    }
}
