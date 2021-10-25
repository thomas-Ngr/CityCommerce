<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $FILTERS;
require_once $UTILS;
require_once $MODELS_DIR . 'ProductModel.php';

if (! empty($_GET['ref'])) {
    $ref = check_reference($_GET['ref']);
} 
else if ( str_contains($_SERVER['HTTP_REFERER'], 'CityCommerce/views') ) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] );
    die();
} 
else {
    header('Location: ' . $VIEWS_DIR_URL);
    die();
}


$product = ProductModel::getProductById($ref);

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="src/css/main.css">
<body>
    <?php include_once($PARTIALS_DIR . "header.php") ?>
    <main>
        <h2>Product details</h2>

        <?php include $PARTIALS_DIR . "errors_and_success.php"; ?>

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
                <a href="order.php?ref=<?= $product->getId(); ?>" class="btn">Buy now !</a>
            </div>
        </section>

    </main>
</body>
</html>