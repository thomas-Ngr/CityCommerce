<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "product.php";

$products_data = yaml_parse_file($PRODUCTS_FILE)['products'];

// create product objects
$products_list = [];
foreach ($products_data as $product) {
    array_push($products_list, new Product(
        $product['reference'],
        $product['name'],
        $product['desc'],
        $product['price'],
        $product['image']
    ));
}

// display product objects
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
                <a href="product.php" class="btn">Details</a>
                <a href="order.php" class="btn">Buy now !</a>
            </div>
        </div>
    <?php endforeach ?>
</section>