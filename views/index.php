<?php

use app\app\Services\ProductType\ProductTypeEnum;

include_once 'includes/header.php';
/* @var $products */ ?>

    <div class="container">
        <div class="wrapper">
            <form action="/remove-product" id="products-form" method="post">
                <div class="items">
                    <?php foreach ($products as $product) : ?>
                        <div class="product">
                            <input class="delete-checkbox" type="checkbox" name="ids[]" value="<?= $product->id ?>">
                            <div class="product-content">
                                <h2 class="product-sku"><?= $product->sku ?></h2>
                                <?= $product->name ?>
                                <h2 class="product-price">$<?= number_format($product->price, 2) ?></h2>
                                <h2 class='product-dimensions'>
                                    <?php
                                    $enum = ProductTypeEnum::getAttribute($product->value)->attribute(); ?>
                                    <?= $enum . ' ' . $product->size . ' ' . $product->value ?>
                                </h2>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
        </div>
    </div>
<?php
include_once 'includes/footer.php'; ?>
