<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $CLASSES_DIR . "product.php";

require_once 'AbstractStorage.php';

/*
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
*/

class FileStorage extends AbstractStorage {

    public function init() {
        $this->data = yaml_parse_file($PRODUCTS_FILE);
    }

    public function readAll($table) {
        return $this->data[$table];
    }

    public function read($table, $id) {
        foreach($this->data[$table] as $element) {
            if ($element->id === $id) {
                return $element;
            }
        }
    }

    public function create($table, $obj) {
        array_push($this->data[$table], $obj);
        register($this->data);
    }

    public function delete($table, $id) {
        foreach($this->data[$table] as $pos => $element) {
            if ($element->id === $id) {
                array_splice($this->data[$table], $pos, 1);
            }
        }
        register($this->data);
    }

    public function update($table, $id, $obj) {
        foreach($this->data[$table] as $pos => $element) {
            if ($element->id === $id) {
                array_replace($this->data[$table], [$pos => $obj]);
            }
        }
        register($this->data);
    }

    private function register($obj_list) {
        yaml_emit_file($PRODUCTS_FILE, $this->data, YAML_UTF8_ENCODING);
    }

}