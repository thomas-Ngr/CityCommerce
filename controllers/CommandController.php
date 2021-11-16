<?php
require_once 'lib/constants.php';
require_once 'classes/order.php';
require_once 'lib/filters.php';
require_once 'classes/client.php';
require_once 'models/OrderModel.php';
require_once 'models/ProductModel.php';

/*
 * CHECK USER INPUT
 */

if (isset($_POST)) {

    $clean = [];
    $clean['name'] = htmlentities(check_word($_POST['name'], $NAME_MAX_LENGTH));
    $clean['first_name'] = htmlentities(check_word($_POST['first_name'], $NAME_MAX_LENGTH));
    $clean['address'] = htmlentities(check_address($_POST['address']));
    $clean['city'] = htmlentities(check_word($_POST['city'], $NAME_MAX_LENGTH));
    $clean['postcode'] = htmlentities(check_postcode($_POST['postcode']));
    $clean['email'] = htmlentities(check_email($_POST['email']));
    $clean['phone'] = htmlentities(check_phone($_POST['phone']));
    $clean['product_ref'] = htmlentities(check_reference($_POST['product']));

    $variables_names = [
        'name',
        'first_name',
        'address',
        'city',
        'postcode',
        'email',
        'phone',
        'product_ref',
    ];
    foreach ($variables_names as $variable_name) {
        if ( ! $clean[$variable_name]) {
            $_SESSION['error'] = 'ERREUR : ' . $variable_name . ' is wrong or not set';
            redirectToReferer('/CityCommerce/order', '/CityCommerce');
        }
    }
}

/*
 * CREATE COMMAND
 * - user infos
 * - command infos
 */

$customer = new Customer (
    $clean['first_name'] . $clean['name'],
    $clean['name'],
    $clean['first_name'],
    $clean['address'] . ' ' . $clean['postcode'] . ' ' . $clean['city'],
    $clean['email'],
    $clean['phone']
);
$product = ProductModel::getProductById($clean['product_ref']);

$order = new Order (
    $customer,
    $product
);
OrderModel::create($order);

/*
 * SET THE ORDER AS A SESSION VARIABLE
 */

$_SESSION['order'] = $order->getId();
header('Location: /CityCommerce/confirm/');
?>