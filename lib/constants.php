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
$DATA_DIR = $ROOT_SERVER . 'data/';

// LIBRARIES location
$FILTERS = $ROOT_SERVER . "lib/filters.php";
$UTILS = $ROOT_SERVER . "lib/utils.php";
$PRODUCTS_LIB = $ROOT_SERVER . "lib/products.php";
$CLASSES_DIR = $ROOT_SERVER . "classes/";
$CONTROLLER_DIR = $ROOT_SERVER . "controllers/";
$MODELS_DIR = $ROOT_SERVER . "models/";

$VIEWS_DIR = $ROOT_SERVER . "views/";
$PARTIALS_DIR = $VIEWS_DIR . "partials/";
$SOURCE_DIR = $VIEWS_DIR . "src/";
$IMAGE_DIR = $SOURCE_DIR . "img/";
$CONTENT_DIR = $SOURCE_DIR . "markdown/";
$PRODUCTS_FILE = $SOURCE_DIR . "products.yaml";

$CONTROLLERS_LOCATION = $ROOT_URL . "controllers/";


// string constants
$NAME_MAX_LENGTH = 50;
$DESCRIPTION_MAX_LENGTH = 700;

// order status
$ORDER_STATUS_DRAFT = 0;
$ORDER_STATUS_PAID = 1;
$ORDER_STATUS_CANCELLED = 2;

?>