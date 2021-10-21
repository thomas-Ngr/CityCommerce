<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="src/css/main.css">
<body>
    <?php include_once($PARTIALS_DIR . "header.php") ?>
    <main>
        <h2>Order</h2>

        <section class="product_card">
            <div class="product_card_image_container">
                <img src="src/img/alice_figure.jpg">
            </div>
            <h3>Alice figure</h3>
            <p>A beautiful figure of Alice to send encrypted messages!</p>
            <p>
                Here, you cn find some details.<br>
                Alice wears a wonderful blue dress and meets the cat Caramel.
            </p>
            <div class="product_card_row">
                <p class="price">12.65 Ğ1</p>
                <a href="order.php" class="btn">Buy now !</a>
            </div>
        </section>

    </main>
</body>
</html>