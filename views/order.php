<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

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
                <img src="<?= $IMAGE_DIR_URL ?>alice_figure.jpg">
            </div>
            <h3>Alice figure</h3>
            <p>A beautiful figure of Alice to send encrypted messages!</p>
            <div class="product_card_row">
                <p class="price">12.65 Ğ1</p>
            </div>
        </section>

        <section>
            <form action="<?= $VIEWS_DIR_URL ?>confirm.php">
                <h2>Your information</h1>
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