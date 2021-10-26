<?php
require_once 'lib/constants.php';
require_once 'lib/filters.php';
require_once 'models/OrderModel.php';

/*
 * FILTER REQUEST
 */

if ( empty($params['order']) || empty($params['action'])) {
    $_SESSION['error'] = 'ERREUR : Confirmation GET request is wrong or not set';
    //header('Location: /' );
    redirectToReferer('CityCommerce/confirm', '/CityCommerce');
}

$order_id = $params['order'];

if ($params['action'] === "cancel" || $params['action'] === "confirm") {
    $action = $params['action'];
} else {
    $_SESSION['error'] = 'ERROR : Confirmation action value is wrong or not set';
    //header('Location: /' );
    redirectToReferer('CityCommerce/confirm', '/CityCommerce');
}

/*
 * UPDATE COMMAND INFORMATION
 */

$order = OrderModel::getOrder($order_id);

switch ($action) {
    case 'cancel':
        if ( OrderModel::cancel($order_id) === true) {
            $_SESSION['success'] = 'Annulation : la commande a été annulée.';
        } else {
            $_SESSION['error'] = 'ERROR : La commande n\'a pas pu être annulée. Contactez l\'administration du site.';
            redirectToReferer('CityCommerce/confirm', '/CityCommerce');
        }
        break;
    case 'confirm':

        if ( OrderModel::pay($order_id) === true) {

            $_SESSION['success'] = 'Confirmation : la commande a été confirmée.';
        } else {
            $_SESSION['error'] = 'ERROR : La commande n\'a pas pu être confirmée. Contactez l\'administration du site.';
            redirectToReferer('CityCommerce/confirm', '/CityCommerce');
        }
        break;
}

// should be a success
header('Location: /CityCommerce' )

?>