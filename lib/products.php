<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "product.php";
require_once $CLASSES_DIR . "FileStorage.php";

$data = new FileStorage();
$data->init();

$products_list = getProductList();

function getProductList() {
    global $data;
    $products_data = $data->readAll('products');

    $products_list = [];
    foreach ($products_data as $product) {
        array_push($products_list, instanciate_product_from_info(
            $product
        ));
    }
    return $products_list;
}

function instanciate_product_from_info($product_info) {
    return new Product(
        $product_info['id'],
        $product_info['name'],
        $product_info['desc'],
        $product_info['price'],
        $product_info['image'],
    );
}
