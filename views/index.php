<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="src/css/main.css">
<link rel="stylesheet" href="src/css/gallery.css">
<body>
    <?php include_once($PARTIALS_DIR . "header.php") ?>
    <main>
        <?php include $PARTIALS_DIR . "errors_and_success.php"; ?>

        <h1>Produits</h1>
        <?php include_once($PARTIALS_DIR . "product_gallery.php") ?>
    </main>
</body>
</html>