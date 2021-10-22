<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

require_once $CLASSES_DIR . 'product.php';
require_once $CLASSES_DIR . 'AbstractStorageCSV.php';

class FileStorage extends AbstractStorageCSV {

    private $filename;
    private $file;
    private $data = [];

    public function __construct($table) {
        $this->filename = "../data/" . $table;
        $this->file = fopen($this->filename, "r+");
    
        while ( ($row = fgetcsv($this->file) ) !== FALSE ) {
          array_push($this->data, $row);
        }
    }

    public function readAll() {
        return $this->data;
    }

    public function readRow($row) {
        return $this->data[$row];
    }

    public function readCell($row, $col) {
        return $this->data[$row][$col];
    }

    public function create($obj) {
        array_push($this->data, $obj);
        fputcsv($this->file, $obj);
    }

    public function remove($row) {
        unset($this->data[$row]);

        unlink($this->filename);
        $this->file = fopen($this->filename, "w+");
        foreach($this->data as $row) {
            fputcsv($this->file, $row);
        }
    }

    public function update($row, $obj) {
        $this->remove($row); 
        $this->create($obj);
    }
}