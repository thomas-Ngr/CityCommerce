<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . 'CSVFileStorage.php';
require_once $CLASSES_DIR . 'product.php';

class ProductModel {

    public static function getAllProducts(){
        $products = [];

        $storage = new FileStorage('products.csv');
        $data = $storage->readAll();

        foreach($data as $row) {
            array_push(
                $products,
                new Product (
                    $id = $row[0],
                    $name = $row[1],
                    $description = $row[3],
                    $price = floatval($row[2]),
                    $image_file = $row[5]
                )
            );
        }

        return $products;
    }

    public static function getProductById($reference){
        $products = ProductModel::getAllProducts();

        foreach($products as $product) {
            if ($product->getId() === $reference) {
                return $product;
            }
        }
        return false;
    }

}


?>