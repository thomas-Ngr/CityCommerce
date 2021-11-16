<?php
require_once 'lib/constants.php';
require_once 'lib/utils.php';
require_once 'classes/product.php';
require_once 'models/ProductModel.php';

/*
echo '<pre>';
var_dump($_FILES);
var_dump($_POST);
echo '</pre>';
die();
*/

if (isset($_POST)) {

    $clean = [];
    $clean['ref'] = htmlentities(check_word($_POST['ref'], $NAME_MAX_LENGTH));
    $clean['name'] = htmlentities(check_word($_POST['name'], $NAME_MAX_LENGTH));
    $clean['desc'] = htmlentities(check_address($_POST['desc']));
    $clean['price'] = floatval($_POST['price']);

    $variables_names = [
        'ref',
        'name',
        'desc',
        'price'
    ];
    foreach ($variables_names as $variable_name) {
        if ( ! $clean[$variable_name]) {
            $_SESSION['error'] = 'ERROR : ' . $variable_name . ' is wrong or not set';
            redirectToReferer('/CityCommerce/admin/addProduct', '/CityCommerce');
        }
    }
}

if (empty($_FILES)){
    $_SESSION['error'] = 'ERROR : no file uploaded.';
    redirectToReferer('/CityCommerce/admin/addProduct', '/CityCommerce');
}

$accepted_types = [
    'image/jpeg',
];
if ( ! in_array($_FILES['image']['type'], $accepted_types) ) {
    $_SESSION['error'] = 'ERROR : image type is not valid';
    redirectToReferer('/CityCommerce/admin/addProduct', '/CityCommerce');
}

$filename = htmlentities($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $IMAGE_DIR . $filename);

// check that a product with same reference does not exist.

if ( ProductModel::getProductById($clean['ref']) !== false) {
    $_SESSION['error'] = 'ERROR : Product reference ' . $clean['ref'] . ' is already used.';
    redirectToReferer('/CityCommerce/admin/addProduct', '/CityCommerce');
}

$product = new Product(
    $clean['ref'],
    $clean['name'],
    $clean['desc'],
    $clean['price'],
    $filename
);
ProductModel::create($product);


// redirect
$_SESSION['success'] = 'OK: Product ' . $clean['name'] . ' has been created!';
redirectToReferer('/CityCommerce/admin/addProduct', '/CityCommerce');



