<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $FILTERS;
require_once $UTILS;

class Customer {
    private $id;
    public $pseudo;
    public $name;
    public $first_name;
    public $address;
    public $email;
    public $phone_number;

    function __construct(
        string $pseudo,
        string $name,
        string $first_name,
        string $address,
        string $email,
        string $phone_number
    ) {
        global $NAME_MAX_LENGTH;
        // create random id
        $this->id = generateRandomString();

        // filter pseudo, name, address
        foreach ([$pseudo, $name, $first_name] as $input) {
            if ( ! check_word($input, $NAME_MAX_LENGTH)) {
                throw new Exception ("ERROR: " . $input . " is not valid.");
            }
        }
        $this->pseudo = $pseudo;
        $this->name = $name;
        $this->first_name = $first_name;

        // filter address
        $this->address = $address;

        // filter email
        if ( ! check_email($email)) {
            throw new Exception ("ERROR: " . $email . " is not valid.");
        }
        $this->email = $email;

        // filter phone
        $this->phone_number = $phone_number;
    }

    function order(Product $product) {
        return new Order($this, $product);
    }


}
?>