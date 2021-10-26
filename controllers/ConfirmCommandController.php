<?php
require_once 'lib/constants.php';
require_once 'lib/filters.php';
require_once 'models/OrderModel.php';

/*
 * FILTER REQUEST
 */

if ( empty($params['action'])) {
    $_SESSION['error'] = 'ERROR : Confirmation GET request is not set.';
    redirectToReferer('CityCommerce/confirm', '/CityCommerce');
}

if ( empty($_SESSION['order'])) {
    $_SESSION['error'] = 'ERROR : Session order is not set.';
    redirectToReferer('CityCommerce/confirm', '/CityCommerce');
}

if ($params['action'] === "cancel" || $params['action'] === "confirm") {
    $action = $params['action'];
} else {
    $_SESSION['error'] = 'ERROR : Confirmation action value is wrong or not set';
    redirectToReferer('CityCommerce/confirm', '/CityCommerce');
}

/*
 * UPDATE COMMAND INFORMATION
 */

$order = OrderModel::getOrder($_SESSION['order']);

switch ($action) {
    case 'cancel':
        if ( OrderModel::cancel($_SESSION['order']) === true) {
            $_SESSION['success'] = 'Annulation : la commande ' . $_SESSION['order'] . ' a été annulée.';
        } else {
            $_SESSION['error'] = 'ERROR : La commande ' . $_SESSION['order'] . ' n\'a pas pu être annulée. Contactez l\'administration du site.';
            $_SESSION['order'] = null;
            redirectToReferer('CityCommerce/confirm', '/CityCommerce');
        }
        break;
    case 'confirm':

        if ( OrderModel::pay($_SESSION['order']) === true) {
            $_SESSION['success'] = 'Confirmation : la commande ' . $_SESSION['order'] . ' a été confirmée.';
        } else {
            $_SESSION['error'] = 'ERROR : La commande ' . $_SESSION['order'] . ' n\'a pas pu être confirmée. Contactez l\'administration du site.';
            $_SESSION['order'] = null;
            redirectToReferer('CityCommerce/confirm', '/CityCommerce');
        }
        break;
}

// should be a success
$_SESSION['order'] = null;
header('Location: /CityCommerce' )

?>