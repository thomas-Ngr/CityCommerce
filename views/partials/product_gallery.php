<?php
require_once 'lib/constants.php';
require_once 'models/ProductModel.php';

$products_list = ProductModel::getAllProducts();
?>
<section class="product_gallery">
    <?php foreach($products_list as $product): ?>
        <div class="product_card">
            <div class="product_card_image_container">
                <img src="<?= $IMAGE_DIR_URL . $product->image_file ?>">
            </div>
            <h3><?= $product->name ?></h3>
            <p><?= $product->description ?></p>
            <div class="product_card_row">
                <p class="price"><?= $product->getPrice() ?> Ğ1</p>
                <a href="product.php?ref=<?= $product->getId() ?>" class="btn">Details</a>
                <a href="order.php?ref=<?= $product->getId() ?>" class="btn">Buy now !</a>
            </div>
        </div>
    <?php endforeach ?>
</section>