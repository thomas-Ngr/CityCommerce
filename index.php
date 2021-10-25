<?php
session_start();
require_once 'lib/constants.php';

/*
 * ROUTER
 */

$base_url = explode('?' , $_SERVER['REQUEST_URI'])[0];
$exploded_base_url = explode('/', $base_url);
$url_dir = $exploded_base_url[2];

switch($url_dir) {
    case '':
        include 'views/index.php';
        break;
    case 'product':
        $param = ( ! empty ($exploded_base_url[3])) ? $exploded_base_url[3] : null;
        include 'views/product.php';
        break;
    case 'order':
        $param = ( ! empty ($exploded_base_url[3])) ? $exploded_base_url[3] : null;
        include 'views/order.php';
        break;
    case 'confirm':
        include 'views/confirm.php';
        break;

    case 'controller':
        $controller = ( ! empty ($exploded_base_url[3])) ? $exploded_base_url[3] : null;
        $param = ( ! empty ($exploded_base_url[4])) ? $exploded_base_url[4] : null;
        switch($controller) {
            case 'order':
                include 'controllers/CommandController.php';
                break;
            case 'product':
                include 'controllers/ProductController.php';
                break;
        }
}



/*
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once('views/partials/head.html') ?>
<link rel="stylesheet" href="views/src/css/gallery.css">
<body>
    <?php include_once('views/partials/header.php') ?>
    <main>
        <?php include_once('views/partials/errors_and_success.php') ?>

        <h1>Produits</h1>
        <?php include_once('views/partials/product_gallery.php') ?>
    </main>
</body>
</html>

<?php */ ?>