<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>

<?php if ( ! empty($_SESSION['error'])){ ?>
    <div class="error_message">
        <p>
            <?= $_SESSION['error'] ;?>
            <?php $_SESSION['error'] = '';?>
        </p>
    </div>
<?php } else if ( ! empty($_SESSION['success'])) { ?>
    <div class="success_message">
        <p>
            <?= $_SESSION['success'] ;?>
            <?php $_SESSION['success'] = '';?>
        </p>
    </div>
<?php }; ?>
