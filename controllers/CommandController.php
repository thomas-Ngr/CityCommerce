<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "order.php";
session_start();
require_once $FILTERS;
require_once $CLASSES_DIR . "client.php";
require_once $CLASSES_DIR . "YAMLFileStorage.php";
require_once $PRODUCTS_LIB;

/*
 * CHECK USER INPUT
 */

if (isset($_POST)) {

    $clean = [];
    $clean['name'] = check_word($_POST['name'], $NAME_MAX_LENGTH);
    $clean['first_name'] = check_word($_POST['first_name'], $NAME_MAX_LENGTH);
    $clean['address'] = check_address($_POST['address']);
    $clean['city'] = check_word($_POST['city'], $NAME_MAX_LENGTH);
    $clean['postcode'] = check_postcode($_POST['postcode']);
    $clean['email'] = check_email($_POST['email']);
    $clean['phone'] = check_phone($_POST['phone']);
    $clean['product_ref'] = check_reference($_POST['product']);

    $variables_names = [
        'name',
        'first_name',
        'address',
        'city',
        'postcode',
        'email',
        'phone',
        'product_ref'
    ];
    foreach ($variables_names as $variable_name) {
        if ( ! $clean[$variable_name]) {
            $_SESSION['error'] = 'ERREUR : ' . $variable_name . ' is wrong or not set';
            header('Location: ' . $VIEWS_DIR_URL . 'order.php?ref=' . $clean['product_ref'] );
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

$data = new FileStorage();
$data->init();
$product_info = $data->read('products', $clean['product_ref'] );
$product = instanciate_product_from_info($product_info);

$order = new Order (
    $customer,
    $product
);

/*
 * SET THE ORDER AS A SESSION VARIABLE
 */

$_SESSION['order'] = serialize($order);
header('Location: ' . $VIEWS_DIR_URL . 'confirm.php');
?>