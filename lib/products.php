<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "product.php";

$products_data = yaml_parse_file($PRODUCTS_FILE)['products'];

$products_list = createProductList($products_data);

function createProductList($products_data) {
    $products_list = [];
    foreach ($products_data as $product) {
        array_push($products_list, new Product(
            $product['reference'],
            $product['name'],
            $product['desc'],
            $product['price'],
            $product['image']
        ));
    }
    return $products_list;
}
