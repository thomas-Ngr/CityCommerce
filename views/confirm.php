<?php
require_once 'classes/order.php';
require_once 'models/OrderModel.php';

$order = OrderModel::getOrder($_SESSION['order']);

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('partials/head.html') ?>
<link rel="stylesheet" href="/CityCommerce/views/src/css/confirm.css">
<body>
    <?php include_once('partials/header.php') ?>
    <main>
        <h2>Confirmation</h2>

        <?php include 'partials/errors_and_success.php'; ?>

        <section>
            <p>Please verify your information before proceeding to payment. The product will be delivered to this address.</p>
            <p><span>Product</span><?= $order->product->name ?></p>
            <p><span>Price</span><?= $order->product->getPrice() ?></p>
            <p><span>Name</span><?= $order->customer->first_name . ' ' . $order->customer->name ?></p>
            <p><span>Address</span><?= $order->customer->address ?></p>
            <p><span>Email</span><?= $order->customer->email ?></p>
            <p><span>Phone</span><?= $order->customer->phone_number ?></p>
            <div>

                <a href="/CityCommerce/controller/confirm/confirm" class="btn">Confirm</a>
                <a href="/CityCommerce/controller/confirm/cancel" class="btn">Dismiss</a>

            </div>
            
        </section>

    </main>
</body>
</html>