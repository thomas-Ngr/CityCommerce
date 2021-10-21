<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="src/css/main.css">
<link rel="stylesheet" href="src/css/confirm.css">
<body>
    <?php include_once($PARTIALS_DIR . "header.php") ?>
    <main>
        <h2>Confirmation</h2>

        <section>
            <p>Please verify your information before proceeding to payment. The product will be delivered to this address.</p>
            <p><span>Product</span>Alice figure</p>
            <p><span>Price</span>12.65</p>
            <p><span>Name</span>John Lennon</p>
            <p><span>Address</span>65 Abbey road, WC2N 5DU London </p>
            <p><span>Email</span>j.lenon@beatles.co.uk</p>
            <p><span>Phone</span>+44 79 75 777 666</p>
            <div>
                <a href="" class="btn">Confirm</a>
                <a href="" class="btn">Dismiss</a>
            </div>
            

        </section>

        
    </main>
</body>
</html>