<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $FILTERS;
require_once $PRODUCTS_LIB;
require_once $CLASSES_DIR . 'YAMLFileStorage.php';

/*
 * FILTER GET REQUEST
 */

if (! empty($_GET['ref'])) {
    $ref = check_reference($_GET['ref']);
}

$storage = new FileStorage();
$storage->init();

$product_info = $storage->read('products', $ref);
// manage error if product is not found .
if ( ! $product_info) {
    $_SESSION['error'] = 'ERREUR : product with reference ' . $ref . ' has not been found.';
    header('Location: ' . $VIEWS_DIR_URL );
}

$product = instanciate_product_from_info($product_info);

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="src/css/main.css">
<link rel="stylesheet" href="src/css/gallery.css">
<link rel="stylesheet" href="src/css/order.css">
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
            <form action="<?= $CONTROLLERS_LOCATION ?>CommandController.php" method="POST">
                <h2>Your information</h1>

                <?php if ( ! empty($_SESSION['error'])): ?>
                    <p class="error_message"><?= $_SESSION['error'] ;?></p>
                <?php
                    $_SESSION['error'] = '';
                    endif;
                ?>

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

                <input type="submit" value="Pay">

            </form>

        </section>
    </main>
</body>
</html>