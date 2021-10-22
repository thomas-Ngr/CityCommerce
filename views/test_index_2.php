<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $MODELS_DIR . 'ProductModel.php';
require_once $MODELS_DIR . 'OrderModel.php';
require_once $CLASSES_DIR . 'client.php';
require_once $CLASSES_DIR . 'order.php';


$truc = ProductModel::getAllProducts();
/*
echo '<pre>';
var_dump($truc);
echo '</pre>';
*/
$product = ProductModel::getProductById('PR2');
/*
echo '<pre>';
var_dump($product);
echo '</pre>';
*/

$customer = new Customer(
    'toto',
    'tom',
    'ngr',
    '44 rue gfdfgd 69000 lyon',
    'bidule@tretre.gf',
    '01 23 45 67 89',
);

$order = new Order(
    $customer,
    $product
);
OrderModel::createOrder($order);

echo 'coucou';

echo "<pre>";
var_dump(OrderModel::getOrder('cmd_6172a8c2cdcc36.63696030'));
echo "</pre>";

OrderModel::payOrder('cmd_6172a8c2cdcc36.63696030');
echo "<pre>";
var_dump(OrderModel::getOrder('cmd_6172a8c2cdcc36.63696030'));
echo "</pre>";

OrderModel::cancelOrder('cmd_6172a8c2cdcc36.63696030');
echo "<pre>";
var_dump(OrderModel::getOrder('cmd_6172a8c2cdcc36.63696030'));
echo "</pre>";

