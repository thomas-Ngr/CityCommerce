<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $FILTERS;
require_once $MODELS_DIR . 'OrderModel.php';

/*
 * FILTER REQUEST
 */

if ( empty($_GET['order']) || empty($_GET['action'])) {
    $_SESSION['error'] = 'ERREUR : Confirmation GET request is wrong or not set';
    header('Location: ' . $VIEWS_DIR_URL );
}

$order_id = $_GET['order'];

if ($_GET['action'] === "cancel" || $_GET['action'] === "confirm") {
    $action = $_GET['action'];
} else {
    $_SESSION['error'] = 'ERREUR : Confirmation action value is wrong or not set';
    header('Location: ' . $VIEWS_DIR_URL );
}

/*
 * UPDATE COMMAND INFORMATION
 */

$order = OrderModel::getOrder($order_id);

switch ($action) {
    case 'cancel':
        OrderModel::cancelOrder($order_id);
        break;
    case 'confirm':
        OrderModel::payOrder($order_id);
        break;
}


// should be a success
$_SESSION['error'] = 'Confirmation : la commande a été confirmée.';
header('Location: ' . $VIEWS_DIR_URL )

?>