<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";

// TODO create regex to filter phone number and address


function check_word($word, $max_length) {
	return (ctype_alnum($word) && strlen($word) < $max_length) ? $word : false;
}

function check_email($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function check_postcode($postcode) {
	$re_postcode = "/^[0-9]{2}\s?[0-9]{3}$/";
	return (preg_match($re_postcode, $postcode)) ? $postcode : false;
}

function check_phone($phone) {
	$re_phone = "/^[0-9]{2}\s?[0-9]{2}\s?[0-9]{2}\s?[0-9]{2}\s?[0-9]{2}$/";
	return (preg_match($re_phone, $phone)) ? $phone : false;
}

function check_command_reference($reference) {
	$re_reference = "/^cmd_[0-9a-f]{14}\.[0-9]{8}$/";
	return (preg_match($re_reference, $reference)) ? $reference : false;
}

function check_reference ($reference) {
	return ctype_digit($reference) ? $reference : false;
}

function check_address ($address) {
	return ( ( ! empty($address)) && ctype_print($address)) ? $address : false;
}


?>