<?php
require_once 'lib/constants.php';
require_once 'lib/filters.php';
require_once 'lib/utils.php';
require_once 'models/ProductModel.php';

// GET ref is param in index router

if (! empty($param)) {
    $ref = check_reference($param);
} 
else if ( str_contains($_SERVER['HTTP_REFERER'], 'CityCommerce') ) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] );
    die();
} 
else {
    header('Location: /CityCommerce');
    die();
}

$product = ProductModel::getProductById($ref);
if ($product === false ) {
    $_SESSION['error'] = 'ERREUR : Confirmation GET request is wrong or not set';
    header('Location: /CityCommerce');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.html') ?>
<link rel="stylesheet" href="views/src/css/main.css">
<body>
    <?php include_once('partials/header.php') ?>
    <main>
        <h2>Product details</h2>

        <?php include 'partials/errors_and_success.php'; ?>

        <section class="product_card">
            <div class="product_card_image_container">
                <img src="<?= $IMAGE_DIR_URL . $product->image_file ?>">
            </div>
            <h3><?= $product->name; ?></h3>
            <p><?= $product->description; ?></p>
            <p>
                Here, you can find some details.<br>
                Alice wears a wonderful blue dress and meets the cat Caramel.
            </p>
            <div class="product_card_row">
                <p class="price"><?= $product->getPrice(); ?> Ğ1</p>
                <a href="/CityCommerce/order/<?= $product->getId(); ?>" class="btn">Buy now !</a>
            </div>
        </section>

    </main>
</body>
</html>