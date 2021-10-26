<?php
require_once 'lib/constants.php';
require_once 'lib/filters.php';
require_once 'lib/utils.php';
require_once 'models/ProductModel.php';

if (! empty($params['ref'])) {
    $ref = check_reference($params['ref']);
} else {
    redirect_to_referer('CityCommerce/', '/CityCommerce');
}

$product = ProductModel::getProductById($ref);

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="/CityCommerce/views/src/css/gallery.css">
<link rel="stylesheet" href="/CityCommerce/views/src/css/order.css">
<body>
    <?php include_once($PARTIALS_DIR . "header.php") ?>
    <main>
        <h2>Order</h2>

        <section class="product_card">
            <div class="product_card_image_container">
                <img src="<?= $IMAGE_DIR_URL . $product->image_file ?>">
            </div>
            <h3><?= $product->name ?></h3>
            <p><?= $product->description ?></p>
            <div class="product_card_row">
                <p class="price"><?= $product->getPrice() ?> Ğ1</p>
            </div>
        </section>

        <section>
            <form action="/CityCommerce/controller/order" method="POST">
                <h2>Your information</h1>

                <?php include $PARTIALS_DIR . "errors_and_success.php"; ?>

                <input type="hidden" name="product" value="<?= $product->getId() ?>">
                <div>
                    <label for="name">Name : </label>
                    <input id="name" name="name" type="text">
                </div>
                <div>
                    <label for="first_name">First name : </label>
                    <input id="first_name" name="first_name" type="text">
                </div>
                <div>
                    <label for="address">Address : </label>
                    <input id="address" name="address" type="text">
                </div>
                <div>
                    <label for="city">City : </label>
                    <input id="city" name="city" type="text">
                </div>
                <div>
                    <label for="postcode">Postal code : </label>
                    <input id="postcode" name="postcode" type="text">
                </div>
                <div>
                    <label for="email">Email : </label>
                    <input id="email" name="email" type="text">
                </div>
                <div>
                    <label for="phone">Phone : </label>
                    <input id="phone" name="phone" type="text">
                </div>

                <input type="submit" value="Order">

            </form>

        </section>
    </main>
</body>
</html>