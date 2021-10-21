<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $FILTERS;
require_once $PRODUCTS_LIB;

if (! empty($_GET['ref'])) {
    $ref = check_reference($_GET['ref']);
    // should create an error if $ref is false
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
<body>
    <?php include_once($PARTIALS_DIR . "header.php") ?>
    <main>
        <h2>Product details</h2>

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