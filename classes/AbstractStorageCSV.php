<?php
abstract class StockageAbstract {
  abstract public function __construct($table);
  abstract public function readAll();
  abstract public function readRow($row);
  abstract public function readCell($row, $col);
  abstract public function create($obj);
  abstract public function remove($row);
  abstract public function update($row, $obj);
}
?>