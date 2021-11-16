<!DOCTYPE html>
<html lang="en">
<?php include_once($PARTIALS_DIR . "head.html") ?>
<link rel="stylesheet" href="/CityCommerce/views/src/css/order.css">
<body>
    <?php include_once('views/partials/header.php') ?>
    <main>
        <h2>Add product</h2>

        <section>
            <form action="/CityCommerce/admin/addProduct" method="POST" enctype="multipart/form-data">

                <?php include 'views/partials/errors_and_success.php'; ?>

                <div>
                    <label for="name">Name : </label>
                    <input id="name" name="name" type="text">
                </div>
                <div>
                    <label for="ref">Reference : </label>
                    <input id="ref" name="ref" type="text">
                </div>
                <div>
                    <label for="desc">Description : </label>
                    <input id="desc" name="desc" type="text">
                </div>
                <div>
                    <label for="price">Price : </label>
                    <input id="price" name="price" type="text">
                </div>
                <div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <label for="image">Image : </label>
                    <input type="file" name="image" id="image" accept="image/jpeg"/>
                </div>

                <input type="submit" value="Add product">
            </form>
        </section>
    
</body>
</html>