<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "client.php";
require_once $CLASSES_DIR . "product.php";
require_once $CLASSES_DIR . "order.php";
require_once $CLASSES_DIR . "page.php";


echo "##### TEST CLIENT #####";
$leo = new Customer (
    "leo1",
    "dupond",
    "leo",
    "10 rue des trucs\n69100 Villeurbanne",
    "leo@truc.net",
    "01 47 56 98 23"
);
echo '<pre>';
var_dump($leo);
echo '</pre>';

echo "##### TEST PRODUCT 1 #####";
$fig_alice = new Product (
    "aaaaaa",
    "Alice figure",
    "A beautiful figure of Alice to send encrypted messages !",
    12.56,
    "alice_figure.jpg"
);

echo '<pre>';
var_dump($fig_alice);
echo '</pre>';

echo "##### TEST PRODUCT 2 #####";
$fig_bob = new Product (
    "bbbbbb",
    "Bob figure",
    "A beautiful figure of Bob to receive encrypted messages !",
    12.56,
    "bob_figure.jpg"
);

echo '<pre>';
var_dump($fig_bob);
echo '</pre>';

echo "##### TEST ORDER #####";
$order_bob = new Order (
    $leo,
    $fig_bob
);

echo '<pre>';
var_dump($order_bob);
echo '</pre>';

echo "##### PAY ORDER #####<br>";
$order_bob->pay();
echo $order_bob->getStatus() . "<br>";

echo "##### CANCEL ORDER #####<br>";
$order_bob->cancel();
echo $order_bob->getStatus() . "<br>";

echo "##### CREATE PAGE #####<br>";
$page = new Page(
    "legal",
    "Sell conditions",
    "legal.md"
);
echo '<pre>';
var_dump($page);
echo '</pre>';
echo $page->generate();
?>