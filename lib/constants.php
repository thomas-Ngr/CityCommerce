<?php
// constants

// HTML location
$ROOT_URL = 'http://localhost/CityCommerce/';
$VIEWS_DIR_URL = $ROOT_URL . "views/";
$SOURCE_DIR_URL = $VIEWS_DIR_URL . "src/";
$IMAGE_DIR_URL = $SOURCE_DIR_URL . "img/";

// FILE location
$ROOT_SERVER = $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/";
$ORDERS_CSV_FILE = $ROOT_SERVER . "orders/orders.csv"; // to be checked

// LIBRARIES location
$FILTERS = $ROOT_SERVER . "lib/filters.php";
$UTILS = $ROOT_SERVER . "lib/utils.php";
$CLASSES_DIR = $ROOT_SERVER . "classes/";

$VIEWS_DIR = $ROOT_SERVER . "views/";
$PARTIALS_DIR = $VIEWS_DIR . "partials/";
$SOURCE_DIR = $VIEWS_DIR . "src/";
$IMAGE_DIR = $SOURCE_DIR . "img/";
$CONTENT_DIR = $SOURCE_DIR . "markdown/";
$PRODUCTS_FILE = $SOURCE_DIR . "products.yaml";

// string constants
$NAME_MAX_LENGTH = 50;
$DESCRIPTION_MAX_LENGTH = 700;

// order status
$ORDER_STATUS_DRAFT = 0;
$ORDER_STATUS_PAID = 1;
$ORDER_STATUS_CANCELLED = 2;

?>