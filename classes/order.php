<?php
require_once 'lib/constants.php';
require_once 'lib/utils.php';
require_once 'classes/client.php';
require_once 'classes/product.php';

class Order {
    private string $id;
    public Customer $customer;
    public Product $product;
    private int $timestamp;
    private int $status;

    function __construct(
        Customer $customer,
        Product $product,
        int $status = 0
    ) {
        $this->id = uniqid('cmd_', true); //generateRandomString();

        $date = new DateTime();
        $this->timestamp = $date->getTimestamp();

        $this->customer = $customer;
        $this->product = $product;
        $this->status = $status;
    }

    function pay() {
        global $ORDER_STATUS_PAID;
        $this->status = $ORDER_STATUS_PAID;

        // write order on the CSV sheet
        //$this->writestate();
    }

    function cancel() {
        global $ORDER_STATUS_CANCELLED;
        $this->status = $ORDER_STATUS_CANCELLED;
    }

    function writeState () {
        global $ORDERS_CSV_FILE;
        // write order on a CSV sheet
    }

    function getStatus () {
        return $this->status;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getTimestamp () {
        return $this->timestamp;
    }

    function setTimestamp ($timestamp) {
        $this->timestamp = $timestamp;
    }
}
?>