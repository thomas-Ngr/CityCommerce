<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "order.php";
session_start();
require_once $MODELS_DIR . 'OrderModel.php';

$order = OrderModel::getOrder($_SESSION['order']);

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

        <?php include $PARTIALS_DIR . "errors_and_success.php"; ?>

        <section>
            <p>Please verify your information before proceeding to payment. The product will be delivered to this address.</p>
            <p><span>Product</span><?= $order->product->name ?></p>
            <p><span>Price</span><?= $order->product->getPrice() ?></p>
            <p><span>Name</span><?= $order->customer->first_name . ' ' . $order->customer->name ?></p>
            <p><span>Address</span><?= $order->customer->address ?></p>
            <p><span>Email</span><?= $order->customer->email ?></p>
            <p><span>Phone</span><?= $order->customer->phone_number ?></p>
            <div>
                <a href="<?= $CONTROLLERS_LOCATION .'ConfirmCommandController.php?order=' . $order->getId() . '&action=confirm' ?>" class="btn">Confirm</a>
                <a href="<?= $CONTROLLERS_LOCATION .'ConfirmCommandController.php?order=' . $order->getId() . '&action=confirm' ?>" class="btn">Dismiss</a>
            </div>
            

        </section>

        
    </main>
</body>
</html>