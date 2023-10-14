<?php

use app\helpers\Helpers;

include_once 'includes/header.php'; ?>

<div class="form-container">
    <form method="post" name="product_form" id="product_form" action="/add_product">
        <div class="cus-input">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku">
        </div>
        <p class="errors" id="sku-error"><?php Helpers::error('sku'); ?></p>
        <div class="cus-input">
            <label for="name">Name</label>
            <input type="text" onkeyup="" id="name" name="name">
        </div>
        <p class="errors" id="name-error"><?php Helpers::error('name'); ?></p>
        <div class="cus-input">
            <label for="price">Price ($)</label>
            <input type="text" id="price" name="price">
        </div>
        <p class="errors" id="price-error"><?php Helpers::error('price'); ?></p>
        <!-- Type Switcher -->
        <div class="cus-input">
            <label for="productType">Type Switcher</label>
            <div id="type">
                <select id="productType" name="type" onchange="createInputs()">
                    <option value="">Select</option>
                    <option value="1">DVD</option>
                    <option value="2">Furniture</option>
                    <option value="3">Book</option>
                </select>
            </div>
        </div>
        <p class="errors" id="type-error"><?php Helpers::error('type'); ?></p>
        <!-- Size of DVD -->
        <div id="type-switcher" class="form"></div>
        <p class="errors"><?php Helpers::error('size'); ?></p>
    </form>
</div>
<?php
include_once 'includes/footer.php';
session_destroy();
?>
