<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

// TODO create regex to filter phone number and address


function check_word($word, $max_length) {
	return (ctype_alnum($word) && strlen($word) < $max_length);
}

function check_email($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>