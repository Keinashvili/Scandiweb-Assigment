<?php

namespace app\app\Controllers;

use app\app\core\Controller;
use app\app\Services\ProductSize\ProductSizeService;
use app\app\Services\ProductType\ProductTypeEnum;
use app\helpers\Helpers;
use app\models\Product;
use app\requests\ProductRequest;

class HomeController extends Controller
{
    public function index(): bool
    {
        $products = (new Product())->all();

        return parent::view('index.php', compact('products'));
    }

    public function create(): bool
    {
        return parent::view('add_product.php');
    }

    public function store(ProductRequest $request)
    {
        $request->validateData();

        (new Product())->create([
            'sku' => $request->sku,
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'size' => (new ProductSizeService())
                ->getSize($request->size),
            'value' => (new ProductTypeEnum())
                ->getType($request->type)->getValue(),
        ]);

        Helpers::redirect('/');
    }

    public function destroy($ids)
    {
        foreach ($ids as $id) {
            (new Product())->delete($id);
        }

        Helpers::redirect('/');
    }
}
