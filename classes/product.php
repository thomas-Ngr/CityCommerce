<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $FILTERS;

class Product {
    private string $reference;
    public string $name;
    public string $description;
    private float $price;
    public string $image_file;

    /* magic methods */

    function __construct(
        string $reference,
        string $name,
        string $description,
        float $price,
        string $image_file
    ) {
        global $NAME_MAX_LENGTH, $DESCRIPTION_MAX_LENGTH, $IMAGE_DIR;
        // filter reference
        // should create a regex
        if ( ! check_word($reference, 10)) {
            throw new Exception ("ERROR: " . $reference . " is not valid.");
        }
        $this->reference = $reference;

        // filter name
        if ( ! (
            ctype_print($name)
            && strlen($name) < $NAME_MAX_LENGTH
        )) {
            throw new Exception ("ERROR: name " . $name . " is not valid.");
        }
        $this->name = $name;

        // filter description
        if (! (
            ctype_print($description)
            && strlen($description) <= $DESCRIPTION_MAX_LENGTH
        )) {
            throw new Exception ("ERROR: description for " . $name . " is not valid.");
        }
        $this->description = $description;

        // filter image_file
        // ensure it exists
        //$image_file = $IMAGE_DIR . $image_file;
        if ( !(
            file_exists($IMAGE_DIR . $image_file)
            && exif_imagetype($IMAGE_DIR . $image_file)
        )) {
            throw new Exception ("ERROR: " . $image_file . "does not exist in the images folder, or is not a valid image file.");
        }
        $this->image_file = $image_file;

        $this->price = $price;
    }

    /* getters, setters */

    function getReference() {
        return $this->reference;
    }

    function getPrice() {
        return $this->price;
    }

    function setPrice(float $price) {

    }
}
?>