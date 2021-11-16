<?php
//require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once 'lib/constants.php';
require_once 'classes/CSVFileStorage.php';  //$CLASSES_DIR . 'CSVFileStorage.php';
require_once 'classes/product.php'; //$CLASSES_DIR . 'product.php';

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

    public static function create($product) {
        // should check that the product does not already exist

        $storage = new FileStorage('products.csv');
        $data = $storage->readAll();
        foreach ($data as $row) {
            if ($row[0] === $product->getId()) {
                throw new Error('ERROR: product reference ' . $row[0] . ' is already used.' );
            }
        }
        $product_row = [
            $product->getId(),
            $product->name,
            $product->getPrice(),
            $product->description,
            '',
            $product->image_file,
        ];
        $storage->create($product_row);
    }
}


?>