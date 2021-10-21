<?php
abstract class AbstractStorage {
    abstract protected function init();
    abstract protected function readAll($table);
    abstract protected function read($table, $id);
    abstract protected function create($table, $obj);
    abstract protected function delete($table, $id);
    abstract protected function update($table, $id, $obj);
}



?>