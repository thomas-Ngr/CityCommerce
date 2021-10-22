<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

require_once $CLASSES_DIR . 'product.php';
require_once $CLASSES_DIR . 'AbstractStorage.php';

class FileStorage extends AbstractStorage {

    public function init() {
        global $PRODUCTS_FILE;
        $this->data = yaml_parse_file($PRODUCTS_FILE);
    }

    public function readAll($table) {
        return $this->data[$table];
    }

    public function read($table, $id) {
        foreach($this->data[$table] as $element) {
            if ($element['id'] == $id) {
                return $element;
            }
        }
    }

    public function create($table, $obj) {
        array_push($this->data[$table], $obj);
        $this->register();
    }

    public function delete($table, $id) {
        foreach($this->data[$table] as $pos => $element) {
            if ($element['id'] === $id) {
                array_splice($this->data[$table], $pos, 1);
            }
        }
        $this->register();
    }

    public function update($table, $id, $obj) {
        foreach($this->data[$table] as $pos => $element) {
            if ($element['id'] === $id) {
                array_replace($this->data[$table], [$pos => $obj]);
            }
        }
        $this->register();
    }

    private function register() {
        yaml_emit_file($PRODUCTS_FILE, $this->data, YAML_UTF8_ENCODING);
    }
}