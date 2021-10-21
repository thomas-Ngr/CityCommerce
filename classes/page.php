<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/CityCommerce/lib/constants.php";
require_once $ROOT_SERVER . "vendors/parsedown.php";

class Page {
    public string $label;
    public string $title;
    public string $content_file;


    function __construct(
        string $label,
        string $title,
        string $content_file
    ) {
        global $NAME_MAX_LENGTH, $CONTENT_DIR;
        // filter label
        if ( ! check_word($label, $NAME_MAX_LENGTH)) {
            throw new Exception ("ERROR: " . $label . " is not valid.");
        }
        // TODO : ensure it is not taken
        $this->label = $label;

        // filter title
        if ( ! (
            ctype_print($title)
            && strlen($title) < $NAME_MAX_LENGTH
        )) {
            throw new Exception ("ERROR: " . $title . " is not valid.");
        }
        $this->title = $title;

        // filter page
        // ensure it exists and is not empty
        $content_file = $CONTENT_DIR . $content_file;
        if ( !(
            file_exists($content_file)
            && mime_content_type($content_file) === 'text/plain'
        )) {
            throw new Exception ("ERROR: " . $content_file . "does not exist or is not a valid text file.");
        }
        $this->content_file = $content_file;
    }


    function generate() {
        $parser = new Parsedown();

        $content = "<h1>$this->title</h1>\n";
        $content .= "<div class=\"page_content\">\n";
        $content .= $parser->text(file_get_contents($this->content_file));
        $content .= "</div>";

        echo $content;
        //echo file_get_contents($this->content_file);
    }

}
?>