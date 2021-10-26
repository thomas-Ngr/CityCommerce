<?php
require_once 'lib/constants.php';
require_once 'lib/filters.php';
require_once 'models/OrderModel.php';

/*
 * FILTER REQUEST
 */

if ( empty($params['order']) || empty($params['action'])) {
    $_SESSION['error'] = 'ERREUR : Confirmation GET request is wrong or not set';
    header('Location: /' );
}

$order_id = $params['order'];

if ($params['action'] === "cancel" || $params['action'] === "confirm") {
    $action = $params['action'];
} else {
    $_SESSION['error'] = 'ERREUR : Confirmation action value is wrong or not set';
    header('Location: /' );
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
$_SESSION['success'] = 'Confirmation : la commande a été confirmée.';
header('Location: /CityCommerce' )

?>