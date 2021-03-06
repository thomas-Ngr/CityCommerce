<?php
require_once 'models/ProductModel.php';

$products_list = ProductModel::getAllProducts();
?>
<section class="product_gallery">
    <?php foreach($products_list as $product): ?>
        <div class="product_card">
            <div class="product_card_image_container">
                <img src="views/src/img/<?= $product->image_file ?>">
            </div>
            <h3><?= $product->name ?></h3>
            <p><?= $product->description ?></p>
            <div class="product_card_row">
                <p class="price"><?= $product->getPrice() ?> Ğ1</p>
                <a href="/CityCommerce/product/<?= $product->getId() ?>" class="btn">Details</a>
                <a href="/CityCommerce/order/<?= $product->getId() ?>" class="btn">Buy now !</a>
            </div>
        </div>
    <?php endforeach ?>
</section>